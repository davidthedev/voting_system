<!DOCTYPE html>
<html>
<head>
    <meta charset="charset=utf-8">
    <title>The Template name</title>
    <link href="<?php echo 'stylesheet.css?=' . time(); ?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div class="container">
            <div class="header-text">
                <h1>Music Genre Voting</h1>
            </div>
        </div>
    </div>
    <div id="site-body">
        <div class="container">
            <div class="main">
                <div class="message">
                    <h2><?php echo $message; ?></h2>
                </div>
                <div class="form-container">
                    <form method="GET" action="">
                        <ul>
                            <li>
                                <div class="vote-count"><?php echo $data['blues']; ?></div>
                                <input type="submit" name="blues" value="vote"/>
                                <div class="genre">Blues</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['classical']; ?></div>
                                <input type="submit" name="classical" value="vote"/>
                                <div class="genre">Classical</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['country']; ?></div>
                                <input type="submit" name="country" value="vote"/>
                                <div class="genre">Country</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['electronic']; ?></div>
                                <input type="submit" name="electronic" value="vote"/>
                                <div class="genre">Electronic</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['folk']; ?></div>
                                <input type="submit" name="folk" value="vote"/>
                                <div class="genre">Folk</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['hip-hop-rap']; ?></div>
                                <input type="submit" name="hip-hop-rap" value="vote"/>
                                <div class="genre">Hip-Hop / Rap</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['jazz']; ?></div>
                                <input type="submit" name="jazz" value="vote"/>
                                <div class="genre">Jazz</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['latin']; ?></div>
                                <input type="submit" name="latin" value="vote"/>
                                <div class="genre">Latin</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['pop']; ?></div>
                                <input type="submit" name="pop" value="vote"/>
                                <div class="genre">Pop</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['rnb']; ?></div>
                                <input type="submit" name="rnb" value="vote"/>
                                <div class="genre">R&B</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['rock']; ?></div>
                                <input type="submit" name="rock" value="vote"/>
                                <div class="genre">Rock</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['soul']; ?></div>
                                <input type="submit" name="soul" value="vote"/>
                                <div class="genre">Soul</div>
                            </li>
                            <li>
                                <div class="vote-count"><?php echo $data['world']; ?></div>
                                <input type="submit" name="world" value="vote"/>
                                <div class="genre">World</div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<div id="footer">
    <div class="container">
        <div class="footer-text">
            <h3><?php echo date('d-M-Y'); ?></h3>
        </div>
    </div>
</div>
</html>
