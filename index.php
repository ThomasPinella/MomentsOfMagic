<?php
    session_start();
    require_once('Database.php');
    require_once('Moments_db.php');

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    $string_id = generateRandomString(16);

    $ip_address = $_SERVER["REMOTE_ADDR"];
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moments of Magic</title>
        <link type="text/css" rel="stylesheet" href="style.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#submit_mom").click(function() {
                    var name = $("#input_name").val();
                    var code = $("#input_code").val();
                    var mom = $("#input_text").val();
                    if (code = "password") {
                        $.post("post.php", {name: name, code: code, mom: mom, session_id: "<?php echo session_id()?>", string_id: "<?php echo $string_id?>", ip_address: "<?php echo $ip_address?>"}, function(data) {
                            alert("Thanks for submitting, " + name +"!");
                            name = $("#input_name").val("");
                            code = $("#input_code").val("");
                            mom = $("#input_text").val("");
                            var html = data + $("#mom_wrapper").html();
                            $("#mom_wrapper").html(html);
                        });
                    } else {
                        alert("Your code is wrong");
                    }
                    return false;
                });
            });
        </script>
    </head>
    <?php include('header.php'); ?>
    <body>
            <div class="add_mom">
                <div id="title">
                    <span>What's your moment?</span>
                </div>
                <div id="info">
                    <input id="input_name" type="text" placeholder="Name" />
                    <input id="input_code" type="password" placeholder="Code" />
                </div>
                <div id="input_mom">
                    <textarea id="input_text" placeholder="Leave your mark..."></textarea>
                </div>
                <div id="submit_mom">
                    <input type="submit" />
                </div>
            </div>
            <div id="mom_wrapper">
            <?php 
                $mom = new Database();
                $mom->db_connect();
                $moments_db = new Moments_db($mom);

                $result = $moments_db->get_all_moms();

                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='mom'>
                        <div class='who'>
                        <img src='media/anon.jpg'><span id='name'>".$row['name']."</span><span id='date'>".$row['date_added']."</span>
                        </div>
                            <p>".$row['mom']."</p>
                        </div>";
                }
            ?>
            <!--
            <div id="first_mom" class="mom">
                <div class="who">
                    <img src="media/anon.jpg"><span id="name">Thomas Pinella</span><span id="date">6/3/2017 4:32pm</span>
                </div>
                <p>There was this one time I had an epic moment. There I was, standing by a river. I was surrounded by a few friends, j chillin'. We were in a small town about a 30 minute bike ride south of Salzburg. Yeah, that's right; we were in Austria. Nbd. Anyways, I was skipping rocks, but the rocks that I was tossing into the river were continually growing in size. Before I knew it, I had worked my way up to lugging small boulders into the shimmering surface. So I threw this relatively large rock, and the moment it made crushing impact with the still water, a fish plopped out of the water. The rock descended; the fish ascended. Like a seesaw. And then, as quickly as it had appeared, it was gone. Out of sight. To this day, I wonder about the fate of that lonesome fish in that lonesome river. Is it alive? Was it traumatized? Did it tell its family about the occurence? I'll never know, but that fish is out there somewhere, either dead or alive.</p>
            </div>

            <div class="mom">
                <div class="who">
                    <img src="media/anon.jpg"><span id="name">Phil Dickinson</span><span id="date">6/1/2017 10:15am</span>
                </div>
               <p>I was running from the lake by my house to my grandmother's when I saw this child driving a toy car. It was a purple car. The child saw me, and then yelled at me. I made a face back and then continued on my way.</p>
            </div>

            <div class="mom">
                <div class="who">
                    <img src="media/anon.jpg"><span id="name">Jane Robularioson</span><span id="date">5/24/2017 9:49pm</span>
                </div>
                <p>There was this one time I had an epic moment. There I was, standing by a river. I was surrounded by a few friends, j chillin'. We were in a small town about a 30 minute bike ride south of Salzburg. Yeah, that's right; we were in Austria. Nbd. Anyways, I was skipping rocks, but the rocks that I was tossing into the river were continually growing in size. Before I knew it, I had worked my way up to lugging small boulders into the shimmering surface. So I threw this relatively large rock, and the moment it made crushing impact with the still water, a fish plopped out of the water. The rock descended; the fish ascended. Like a seesaw. And then, as quickly as it had appeared, it was gone. Out of sight. To this day, I wonder about the fate of that lonesome fish in that lonesome river. Is it alive? Was it traumatized? Did it tell its family about the occurence? I'll never know, but that fish is out there somewhere, either dead or alive. Before I knew it, I had worked my way up to lugging small boulders into the shimmering surface. So I threw this relatively large rock, and the moment it made crushing impact with the still water, a fish plopped out of the water. The rock descended; the fish ascended. Like a seesaw. And then, as quickly as it had appeared, it was gone. Out of sight. To this day, I wonder about the fate of that lonesome fish in that lonesome river. Is it alive? Was it traumatized? Did it tell its family about the occurence? I'll never know, but that fish is out there somewhere, either dead or alive.</p>
            </div> -->   
            </div>


    </body>
</html>







































