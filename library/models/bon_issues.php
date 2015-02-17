<?php 

// Returns the Issue name the post belongs to
// or an empty string if no issue
function bon_get_bon_issue($id, $type = 'name') {
  $issue = get_the_terms( $id, 'bon_issues' );

  if(!$issue) {
    return '';
  }

  // Array has IDs as keys. Reset to retrieve first one.
  $issue = reset($issue);

  if($type == 'name') {
    $issue_return = $issue->name;
  } elseif($type == 'slug') {
    $issue_return = $issue->slug;
  }
  return $issue_return;
}

function bon_the_bon_issue($id) {
  echo bon_get_bon_issue($id, 'name');
}