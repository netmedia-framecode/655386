<?php

$messageTypes = ["success", "info", "warning", "danger", "dark"];

if (!isset($_SESSION["project_spk_blt"]["users"])) {
  if (isset($_SESSION["project_spk_blt"]["time_message"]) && (time() - $_SESSION["project_spk_blt"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_spk_blt"]["message_$type"])) {
        unset($_SESSION["project_spk_blt"]["message_$type"]);
      }
    }
    unset($_SESSION["project_spk_blt"]["time_message"]);
  }
} else if (isset($_SESSION["project_spk_blt"]["users"])) {
  if (isset($_SESSION["project_spk_blt"]["users"]["time_message"]) && (time() - $_SESSION["project_spk_blt"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_spk_blt"]["users"]["message_$type"])) {
        unset($_SESSION["project_spk_blt"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_spk_blt"]["users"]["time_message"]);
  }
}
