<?php
    /**
     * Show Mail Address
     *
     * Simple plugin to show the first mail-address from the users identity.
     * Therefor it is easy to use another user-attribute for the roundcube
     * internal username. So you can change the mail-address without
     * loosing the users addressbook or other configurations.
     *
     * To show the mail address, edit the roundcube skin and replace:
     * <roundcube:object name="username" />
     * with:
     * <roundcube:object name="plugin.show_mailaddr" />
     *
     * @version 0.1
     * @author Helge Wiethoff
     */
    class show_mailaddr extends rcube_plugin
    {
        function init()
        {
            $this->register_handler('plugin.show_mailaddr', array($this, 'get_mailaddr'));
        }

        function get_mailaddr()
        {
            $rcmail = rcmail::get_instance();
            $user = $rcmail->user;
            $identity = $user->get_identity();

            return ($identity['email']);
        }
    }