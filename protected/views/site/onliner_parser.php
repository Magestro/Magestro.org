<?php
ob_clean();

OnlinerParser::getInstance()->parse();

exit();