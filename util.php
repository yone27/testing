<?php
    class Util {
        // Method for input value sanitization
        public function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);

            return $data;
        }
        // Method for displaying success and error messages
        public function showMessage($type, $message) {
            return '
            <div class="alert alert-custom alert-custom--'.$type.' alert-dismissible alert-slideInLeft" role="alert">
                <div class="alert-custom__icon">
                    <i class="fas fa-check-circle icon"></i>
                </div>
                <div class="alert-custom__content">
                    <p>'.$message.'</p>
                </div>
                <div class="alert-custom__close">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle icon"></i></button>
                </div>
            </div>';
        }
        // Method for displaying  operation summary
        public function showOperationSummary($type, $message) {
            return '
            <div class="alert alert-custom alert-custom--'.$type.' alert-dismissible alert-slideInLeft" role="alert">
                <div class="alert-custom__icon">
                    <i class="fas fa-check-circle icon"></i>
                </div>
                <div class="alert-custom__content">
                    <p>'.$message.'</p>
                </div>
                <div class="alert-custom__close">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle icon"></i></button>
                </div>
            </div>';
        }
    }