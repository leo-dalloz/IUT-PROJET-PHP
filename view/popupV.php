<?php
session_start();
if (isset($_SESSION['popupsuccess'])) {
    echo '<div class="popup popupsuccess">'
        .$_SESSION['popupsuccess'].
        '</div>';
    unset($_SESSION['popupsuccess']);
}
if (isset($_SESSION['popuperror'])) {
    echo '<div class="popup popuperror">'
        .$_SESSION['popuperror'].
        '</div>';
    unset($_SESSION['popuperror']);
}