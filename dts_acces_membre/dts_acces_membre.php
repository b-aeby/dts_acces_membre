<?php
/**
 * Plugin Name: DTS: accès membre
 * Plugin URI: https://github.com/b-aeby/dts_acces_membre
 * Description: Restriction d'accès au formulaire de réservation aux évènements selon les tags d'évènement (slugs = membre-actif, membre-passif, non-membre) et le statut de membre, par le shortcode [acces_membre] déclaré dans les réglages avancés d'Event Manager (Format page évènement seul)
 * Version: 1.1
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function get_custom_ur_subscriptions($atts, $content = null) {
    global $wpdb;
    $output = '';

    // --- PARTIE 1 : TAGS EVENTS MANAGER ---
    // On vérifie si on est sur un événement individuel (Single Event)
    
    $event_id = get_the_ID();
    // Récupère les termes de la taxonomie 'event-tag'
    
    $sql = <<<SQL
    SELECT t.name, t.slug, rel.object_id 
    FROM {$wpdb->prefix}term_relationships rel
    INNER JOIN {$wpdb->prefix}term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
    INNER JOIN {$wpdb->prefix}terms t ON t.term_id = tax.term_id
    WHERE rel.object_id = %d 
SQL;

    $tags = $wpdb->get_results($wpdb->prepare($sql, $event_id));

    // --- PARTIE 2 : ABONNEMENTS USER REGISTRATION ---
    $user_id = get_current_user_id();
    if ( ! $user_id ) {
        $output .= '<p>Veuillez vous connecter pour vour inscrire à cet évènement.</p>';
        $output .= '<p><a href="https://diabetetypesport.ch/login-2/">login</a></p>';

        return $output;
    }

    $tags_slugs = array_column($tags, 'slug');
    $tags_names = array_column($tags, 'name');

    $query_memberships = <<<SQL
    SELECT urms.item_id, urms.status, p.post_title, p.post_name 
    FROM {$wpdb->prefix}ur_membership_subscriptions urms
    INNER JOIN {$wpdb->prefix}posts p ON p.ID = urms.item_id
    WHERE user_id = %d
SQL;

    $results = $wpdb->get_results( $wpdb->prepare($query_memberships, $user_id));

    if ( empty( $results ) ) {
        $output .= '<p> Aucun statut de membre défini pour ce compte.</p>';
        $output .= 'Cet évènement est reservé aux comptes au statut : ' . implode(', ', $tags_names) . '</p>';
    } else {
        $memberships_slugs = array_column($results, 'post_name');
        $memberships_names = array_column($results, 'post_title');
        if ( count($memberships_slugs)>0 ) {
            foreach ( $memberships_slugs as $slug ) {
                if ( in_array( $slug, $tags_slugs ) ) {
                    if ( null !== $content ) {
                        $output = '<div class="shortcode-inner-content">';
                        // do_shortcode permet d'exécuter d'autres shortcodes s'ils sont imbriqués
                        $output .= do_shortcode( $content ); 
                        $output .= '</div>';
                    } 
                } else {
                    $output = '<p> Votre compte a le statut de "' . esc_html( $memberships_names[0] ) . '".</p>' .
                    $output .= '<p> Cet évènement est reservé aux comptes au statut : ' . implode(', ', $tags_names) . '</p>';                    
                }
            }
        }
        
    }

    return $output;
}

add_shortcode( 'acces_membre', 'get_custom_ur_subscriptions' );