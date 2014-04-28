<?php

/**
 * @file
 * Contains \Eloqua\Api\Contact.
 */

namespace Eloqua\Api\Data;

use Eloqua\Api\AbstractApi;
use Eloqua\Api\SearchableInterface;

/**
 * Eloqua Contact.
 */
class Contact extends AbstractApi implements SearchableInterface {

  /**
   * {@inheritdoc}
   */
  public function search($search, array $options = array()) {
    return $this->get('data/contacts', array_merge(array(
      'search' => $search,
    ), $options));
  }

  /**
   * Return extended information about a contact by its ID.
   *
   * @param int $id
   *   The ID associated with the desired contact.
   *
   * @return array
   *   The desired contact record represented as an associative array.
   */
  public function show($id) {
    return $this->get('data/contact/' . rawurlencode($id));
  }

  /**
   * Return subscriptions for a contact by its ID.
   *
   * @param int $id
   *   The ID associated with the given contact.
   *
   * @return array
   *   An array of contact subscriptions.
   */
  public function subscriptions($id) {
    return $this->get('data/contact/' . rawurlencode($id) . '/email/groups/subscription');
  }

}
