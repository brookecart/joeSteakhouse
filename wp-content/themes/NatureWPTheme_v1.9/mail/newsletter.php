<?php

global $nature_mt;

            $absolute_path = __FILE__;
            $path_to_file = explode( 'wp-content', $absolute_path );
            $path_to_wp = $path_to_file[0];

            // Access WordPress
            require_once( $path_to_wp . '/wp-load.php' );
			if(!$_POST) exit;
            $nature_mt = get_option('nature_mt');
            $email = esc_html($_POST['nemail']);
            $msg = esc_attr('E-mail Subscriber: ', 'nature') . $email;
            $to = $nature_mt['n-email'];
            $sitename = get_bloginfo('name');
            $subject = '[' . $sitename . ']' . ' New Message';
            $headers = 'From: <' . $email . '>' . PHP_EOL;
            if( wp_mail( $to, $subject, $msg, $headers));     
           // wp_mail($to, $subject, $msg, $headers);

?>