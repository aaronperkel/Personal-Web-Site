        <nav>
            <a class="<?php
            if ($pathParts['filename'] == 'index') {
                print 'activePage';
            }
            ?>" href="/">Home</a>

            <a class="<?php
            if ($pathParts['filename'] == 'about') {
                print 'activePage';
            }
            ?>" href="about">About</a>

            <a class="<?php
            if ($pathParts['filename'] == 'resume') {
                print 'activePage';
            }
            ?>" href="resume">Resume</a>
        </nav>
        <hr>