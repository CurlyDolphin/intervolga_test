<?php

function countSisters($sisters, $brothers) {
    return $sisters + 1; // Количество сестёр у любого брата равно числу сестёр
    // +1 так как Алиса тоже является сестрой
}

echo countSisters(3, 2); 
?>