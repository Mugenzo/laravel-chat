<?php

Broadcast::channel('channel.{id}', function () {
    return true;
});
