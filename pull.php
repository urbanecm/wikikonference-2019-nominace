<?php
header('Content-Type: text/plain');
echo(exec('git pull 2>&1'));
