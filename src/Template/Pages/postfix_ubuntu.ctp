<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="generator" content="Jekyll v3.6.0">
  <meta name="robots" content="noindex,nofollow">
  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Documentation extras -->
  <link href="/css/docs.min.css" rel="stylesheet">
  <link href="/css/drible.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/img/favicons/favicon-32x32.png" sizes="32x32" type="img/png">
  <link rel="icon" href="/img/favicons/favicon-16x16.png" sizes="16x16" type="img/png">
  <link rel="manifest" href="#">
  <link rel="mask-icon" href="#" color="#000">
  <link rel="icon" href="#">
  <meta name="msapplication-config" content="#">
  <meta name="theme-color" content="#000">

  <!-- Meta -->
  <meta name="description" content="Drible - Página de Introdução e Trabalho">
  <meta name="author" content="Drible">

  <!-- Twitter -->
  <meta name="twitter:site" content="@getbootstrap">
  <meta name="twitter:creator" content="@getbootstrap">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Drible">
  <meta name="twitter:description" content="Drible - Página de Introdução e Trabalho">
  <meta name="twitter:image" content="https://getbootstrap.com/assets/brand/bootstrap-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="https://getbootstrap.com">
  <meta property="og:title" content="Drible">
  <meta property="og:description" content="Drible - Página de Introdução e Trabalho">
  <meta property="og:image" content="http://getbootstrap.com/assets/brand/bootstrap-social.png">
  <meta property="og:image:secure_url" content="https://getbootstrap.com/assets/brand/bootstrap-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <meta charset="utf-8">
</head>
<body>
  <!-- CONTENT  -->
  <main class="bd-masthead" id="content" role="main">
    <div class="container">
      <div class="row">
        <div class="col-12 ">
          <div class="container">
            <div class="text-center">
              <img src="/img/postfix.png" class="img-fluid"/>
              <h2>How To Install and Configure Postfix on Ubuntu 16.04</h2>
            </div>
            <hr>
            <h2>Introduction</h2>
            <p class="lead">Postfix is a popular open-source Mail Transfer Agent (MTA) that can be used to route and deliver email on a Linux system.  It is estimated that around 25% of public mail servers on the internet run Postfix.</p>
            <p class="lead">In this guide, we'll teach you how to get up and running quickly with Postfix on an Ubuntu 16.04 server.</p>
            <hr>
            <h2>Prerequisites</h2>
            <p class="lead">In order to follow this guide, you should have access to a non-root user with <code>sudo</code> privileges.  You can follow our <a href="https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04">Ubuntu 16.04 initial server setup guide</a> to create the necessary user.</p>
            <p class="lead">In order to properly configure Postfix, you will need a Fully Qualified Domain Name pointed at your Ubuntu 16.04 server.  You can find help on setting up your domain name with DigitalOcean by following <a href="https://www.digitalocean.com/community/articles/how-to-set-up-a-host-name-with-digitalocean">this guide</a>.  If you plan on accepting mail, you will need to make sure you have an MX record pointing to your mail server as well.</p>
            <p class="lead">For the purposes of this tutorial, we will assume that you are configuring a host that has the FQDN of <code>mail.example.com</code>.</p>
            <hr>
            <h2>Step 1: Install Postfix</h2>
            <p class="lead">Postfix is included in Ubuntu's default repositories, so installation is incredibly simple.</p>
            <p class="lead">To begin, update your local <code>apt</code> package cache and then install the software.  We will be passing in the <code>DEBIAN_PRIORITY=low</code> environmental variable into our installation command in order to answer some additional prompts:</p>
            <code>$ sudo apt-get update</code>
            <code>sudo DEBIAN_PRIORITY=low apt-get install postfix</code>
            <p class="lead">Use the following information to fill in your prompts correctly for your environment:</p>
            <ul>
              <li class="lead"><strong>General type of mail configuration?</strong>: For this, we will choose <strong>Internet Site</strong> since this matches our infrastructure needs.</li>
              <li class="lead"><strong>System mail name</strong>: This is the base domain used to construct a valid email address when only the account portion of the address is given.  For instance, the hostname of our server is <code>mail.example.com</code>, but we probably want to set the system mail name to <code>example.com</code> so that given the username <code>user1</code>, Postfix will use the address <code>user1@example.com</code>.</li>
              <li class="lead"><strong>Root and postmaster mail recipient</strong>: This is the Linux account that will be forwarded mail addressed to <code>root@</code> and <code>postmaster@</code>.  Use your primary account for this.  In our case, <strong>sammy</strong>.</li>
              <li class="lead"><strong>Other destinations to accept mail for</strong>: This defines the mail destinations that this Postfix instance will accept.  If you need to add any other domains that this server will be responsible for receiving, add those here, otherwise, the default should work fine.</li>
              <li class="lead"><strong>Force synchronous updates on mail queue?</strong>: Since you are likely using a journaled filesystem, accept <strong>No</strong> here.</li>
              <li class="lead"><strong>Local networks</strong>: This is a list of the networks that your mail server is configured to relay messages for.  The default should work for most scenarios.  If you choose to modify it, make sure to be very restrictive in regards to the network range.</li>
              <li class="lead"><strong>Mailbox size limit</strong>: This can be used to limit the size of messages.  Setting it to "0" disables any size restriction.</li>
              <li class="lead"><strong>Local address extension character</strong>: This is the character that can be used to separate the regular portion of the address from an extension (used to create dynamic aliases).</li>
              <li class="lead"><strong>Internet protocols to use</strong>: Choose whether to restrict the IP version that Postfix supports.  We'll pick "all" for our purposes.</li>
            </ul>
            <p class="lead">To be explicit, these are the settings we'll use for this guide:</p>
            <ul>
              <li class="lead"><strong>General type of mail configuration?</strong>: Internet Site</li>
              <li class="lead"><strong>System mail name</strong>: example.com (not mail.example.com)</li>
              <li class="lead"><strong>Root and postmaster mail recipient</strong>: sammy</li>
              <li class="lead"><strong>Other destinations to accept mail for</strong>: $myhostname, example.com, mail.example.com, localhost.example.com, localhost</li>
              <li class="lead"><strong>Force synchronous updates on mail queue?</strong>: No</li>
              <li class="lead"><strong>Local networks</strong>: 127.0.0.0/8 [::ffff:127.0.0.0]/104 [::1]/128</li>
              <li class="lead"><strong>Mailbox size limit</strong>: 0</li>
              <li class="lead"><strong>Local address extension character</strong>: +</li>
              <li class="lead"><strong>Internet protocols to use</strong>: all</li>
            </ul>
            <p class="lead">If you need to ever return to re-adjust these settings, you can do so by typing:</p>
            <code>$ sudo dpkg-reconfigure postfix </code>
            <p class="lead">The prompts will be pre-populated with your previous responses.</p>
            <p class="lead">When you are finished, we can now do a bit more configuration to set up our system how we'd like it.</p>
            <hr>
            <h2>Step 2: Tweak the Postfix Configuration</h2>
            <p class="lead">Next, we can adjust some settings that the package did not prompt us for.</p>
            <p class="lead">To begin, we can set the mailbox.  We will use the <strong>Maildir</strong> format, which separates messages into individual files that are then moved between directories based on user action.  The other option is the <strong>mbox</strong> format (which we won't cover here) which stores all messages within a single file.</p>
            <p class="lead">We will set the <code>home_mailbox</code> variable to <code>Maildir/</code> which will create a directory structure under that name within the user's home directory.  The <code>postconf</code> command can be used to query or set configuration settings.  Configure <code>home_mailbox</code> by typing:</p>
            <code> $ sudo postconf -e 'home_mailbox= Maildir/'</code>
            <p></p>
            <p class="lead">Next, we can set the location of the <code>virtual_alias_maps</code> table.  This table maps arbitrary email accounts to Linux system accounts.  We will create this table at <code>/etc/postfix/virtual</code>.  Again, we can use the <code>postconf</code> command:</p>
            <code> $ sudo postconf -e 'virtual_alias_maps= hash:/etc/postfix/virtual'</code>
            <hr>
            <h2>Step 3: Map Mail Addresses to Linux Accounts</h2>
            <p class="lead">Next, we can set up the virtual maps file.  Open the file in your text editor:</p>
            <code> $ sudo nano /etc/postfix/virtual</code>
            <p class="lead">The virtual alias map table uses a very simple format.  On the left, you can list any addresses that you wish to accept email for.  Afterwards, separated by whitespace, enter the Linux user you'd like that mail delivered to.</p>
            <p class="lead">For example, if you would like to accept email at <code>contact@example.com</code> and <code>admin@example.com</code> and would like to have those emails delivered to the <code>sammy</code> Linux user, you could set up your file like this:</p>
            <div class="text-center">
              <code>/etc/postfix/virtual</code>
            </div>
            <code>contact@example.com sammy</br>
              admin@example.com sammy</code>
              <p></p>
              <p class="lead">After you've mapped all of the addresses to the appropriate server accounts, save and close the file.</p>
              <p class="lead">We can apply the mapping by typing:</p>
              <code> $ sudo postmap /etc/postfix/virtual</code>
              <p></p>
              <p class="lead">Restart the Postfix process to be sure that all of our changes have been applied:</p>
              <code>$ sudo systemctl restart postfix</code>
              <hr>
              <h2>Step 4: Adjust the Firewall</h2>
              <p class="lead">If you are running the UFW firewall, as configured in the initial server setup guide, we'll have to allow an exception for Postfix.</p>
              <p class="lead">You can allow connections to the service by typing:</p>
              <code>$ sudo ufw allow Postfix</code>
              <p></p>
              <p class="lead">The Postfix server component is installed and ready.  Next, we will set up a client that can handle the mail that Postfix will process.</p>
              <p class="lead">Before we install a client, we should make sure our <code>MAIL</code> environmental variable is set correctly.  The client will inspect this variable to figure out where to look for user's mail.</p>
              <p class="lead">In order for the variable to be set regardless of how you access your account (through <code>ssh</code>, <code>su</code>, <code>su -</code>, <code>sudo</code>, etc.) we need to set the variable in a few different locations.  We'll add it to <code>/etc/bash.bashrc</code> and a file within <code>/etc/profile.d</code> to make sure each user has this configured.</p>
              <p class="lead">To add the variable to these files, type:</p>
              <code>echo 'export MAIL=~/Maildir' | sudo tee -a /etc/bash.bashrc | sudo tee -a /etc/profile.d/mail.sh</code>
              <p></p>
              <p class="lead">To read the variable into your current session, you can source the <code>/etc/profile.d/mail.sh</code> file:</p>
              <code>source /etc/profile.d/mail.sh</code>
              <hr>
              <h2>Step 6: Install and Configure the Mail Client</h2>
              <p class="lead">In order to interact with the mail being delivered, we will install the <code>s-nail</code> package.  This is a variant of the BSD <code>xmail</code> client, which is feature-rich, can handle the Maildir format correctly, and is mostly backwards compatible.  The GNU version of <code>mail</code> has some frustrating limitations, such as always saving read mail to the mbox format regardless of the source format.</p>
              <p class="lead">To install the <code>s-nail</code> package, type:</p>
              <code>$ sudo apt-get install s-nail</code>
              <p></p>
              <p class="lead">We should adjust a few settings.  Open the <code>/etc/s-nail.rc</code> file in your editor:</p>
              <code>$ sudo nano /etc/s-nail.rc</code>
              <p></p>
              <p class="lead">Towards the bottom of the file, add the following options:</p>
              <div class="text-center">
                <code>/etc/s-nail.rc</code>
              </div>
              <code>. . .
              </br>set emptystart
            </br>set folder=Maildir
          </br>set record=+sent
        </code>
        <p></p>
        <p class="lead">This will allow the client to open even with an empty inbox.  It will also set the <code>Maildir</code> directory to the internal <code>folder</code> variable and then use this to create a <code>sent</code> mbox file within that, for storing sent mail.</p>
        <p class="lead">Now, we can test the client out.</p>
        <hr>
        <h3>Initializing the Directory Structure</h3>
        <p class="lead">The easiest way to create the Maildir structure within our home directory is to send ourselves an email.  We can do this with the <code>mail</code> command.  Because the <code>sent</code> file will only be available once the Maildir is created, we should disable writing to that for our initial email.  We can do this by passing the <code>-Snorecord</code> option.</p>
        <p class="lead">Send the email by piping a string to the <code>mail</code> command.  Adjust the command to mark your Linux user as the recipient:</p>
        <code>$ echo 'init' | mail -s 'init' -Snorecord sammy</code>
        <p></p>
        <p class="lead">You should get the following response:</p>
        <code>Output</code>
        <code>Can't canonicalize "/home/sammy/Maildir"</code>
        <p></p>
        <p class="lead">This is normal and will only show during this first message.  We can check to make sure the directory was created by looking for our <code>~/Maildir</code> directory:</p>
        <code>$ ls -R ~/Maildir</code>
        <p></p>
        <p class="lead">You should see the directory structure has been created and that a new message file is in the <code>~/Maildir/new</code> directory:</p>
        <code>Output</code></br>
        <code>/home/sammy/Maildir/:
        </br>cur  new  tmp

      </br>/home/sammy/Maildir/cur:

    </br>/home/sammy/Maildir/new:
  </br>1463177269.Vfd01I40e4dM691221.mail.example.com

</br>/home/sammy/Maildir/tmp:
</code>
<p></p>
<p class="lead">It looks like our mail has been delivered.</p>
<hr>
<h3>Managing Mail with the Client</h3>
<p class="lead">Use the client to check your mail:</p>
<code>$ mail</code>
<p></p>
<p class="lead">You should see your new message waiting:</p>
<code>Output</br>
  s-nail version v14.8.6.  Type ? for help.
</br>"/home/sammy/Maildir": 1 message 1 new
</br>&gt;N  1 sammy@example.com     Wed Dec 31 19:00   14/369   init
</code>
<p></p>
<p class="lead">Just hitting <strong>ENTER</strong> should display your message:</p>
<code>Output</br>[-- Message  1 -- 14 lines, 369 bytes --]:
</br>From sammy@example.com Wed Dec 31 19:00:00 1969
</br>Date: Fri, 13 May 2016 18:07:49 -0400
</br>To: sammy@example.com
</br>Subject: init
</br>Message-Id: &lt;20160513220749.A278F228D9@mail.example.com&gt;</br>
From: sammy@example.com
</br>init
</code>
<p></p>
<p class="lead">You can get back to your message list by typing <strong>h</strong>:</p>
<code>? d</code></br>
</br>
<p></p>
<code >output
</br>s-nail version v14.8.6.  Type ? for help.
</br>"/home/sammy/Maildir": 1 message 1 new
</br>&gt;R  1 sammy@example.com     Wed Dec 31 19:00   14/369   init
</code>
<p></p>
<p class="lead">You can get back to your message list by typing <strong>h</strong>:</p>
<code>? h</code></br>
</br>
<p></p>
<code>Output
</br>s-nail version v14.8.6.  Type ? for help.
</br>"/home/sammy/Maildir": 1 message 1 new
</br>&gt;R  1 sammy@example.com     Wed Dec 31 19:00   14/369   init
</code>
<p></p>
<p class="lead">Since this message isn't very useful, we can delete it with <strong>d</strong>:</p>
<code>? d</code></br>
<p></p>
<p class="lead">Quit to get back to the terminal by typing <strong>q</strong>:</p>
<code>? q</code></br>
<hr>
<h3>Sending Mail with the Client</h3>
<p class="lead">You can test sending mail by typing a message in a text editor:</p>
<code>$ nano ~/test_message</code>
<p></p>
<p class="lead">Inside, enter some text you'd like to email:</p>
<div class="text-center"><code>~/test_message</code></div>
<code>Hello,</br>
  This is a test.  Please confirm receipt!
</code></br>
<p></p>
<p class="lead">Using the <code>cat</code> command, we can pipe the message to the <code>mail</code> process.  This will send the message as your Linux user by default.  You can adjust the "From" field with the <code>-r</code> flag if you want to modify that value to something else:</p>
<code>$ cat ~/test_message | mail -s 'Test email subject line' -r from_field_account useremail.com</code>
<p></p>
<p class="lead">The options above are:</p>
<ul>
  <li class="lead"><code>-s</code>: The subject line of the email</li>
  <li class="lead"><code>-r</code>: An optional change to the "From:" field of the email.  By default, the Linux user you are logged in as will be used to populate this field.  The <code>-r</code> option allows you to override this.</li>
  <li class="lead"><code>user@email.com</code>: The account to send the email to.  Change this to be a valid account you have access to.</li>
</ul>
<p class="lead">You can view your sent messages within your <code>mail</code> client.  Start the interactive client again by typing:</p>
<code>$ mail</code>
<p></p>
<p class="lead">Afterwards, view your sent messages by typing:</p>
<code>? file +sent</code>
<p></p>
<p class="lead">You can manage sent mail using the same commands you use for incoming mail.</p>
<hr>
<h2>Conclusion</h2>
<p class="lead">You should now have Postfix configured on your Ubuntu 16.04 server.  Managing email servers can be a tough task for beginning administrators, but with this configuration, you should have basic MTA email functionality to get you started.</p>



</div>
</div>
</div>
</div>
</main>
</body>
</html>
