<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 * public $val = 0;
 * public $next = null;
 * function __construct($val = 0, $next = null) {
 * $this->val = $val;
 * $this->next = $next;
 * }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @param int $n
     * @return ListNode
     */
    function removeNthFromEnd(&$head, $n)
    {
        $count = $this->countNodes($head);
        $nextNode = $head->next;
        $currentNode = $head;
        $prevNode = null;
        $index = $count - $n; //$index want to remove
        while ($index) {
            $prevNode = $currentNode;
            $currentNode = $nextNode;
            $nextNode = $nextNode->next;
            $index--;
        }

        if ($count - $n == 0)
            $head = $nextNode;
        else
            $prevNode->next = $nextNode;

        return $head;
    }
    function countNodes($head)
    {
        $count = 1;
        while ($head->next) {
            $head = $head->next;
            $count++;
        }
        return $count;
    }
}