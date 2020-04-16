<?php

class Skills {
    public $name;
    public $value;

    function __construct($name, $value){
        $this->name = $name;
        $this->value = $value;
    }

};

class Projects{
    public $name;
    public $skillsUsed;
    public $text;
    public $desktopImg;
    public $phoneImg;
    public $bgImg;
    public $link;


    function __construct($name, $skillsUsed, $text, $desktopImg, $phoneImg, $bgImg, $link){
        $this->name = $name;
        $this->skillsUsed = $skillsUsed;
        $this->text = $text;
        $this->desktopImg = $desktopImg;
        $this->phoneImg = $phoneImg;
        $this->bgImg = $bgImg;
        $this->link = $link;

    }

}

$projectArray = Array(
    new Projects("ELOUIZA UPLIFTS", Array("HTML", "CSS", "JAVASCRIPT", "PHP", "WORDPRESS"),
    "Custom built word press theme. If you’re into fitness, food, lifestyle and being a student then check this space out. Elouiza gives great tips on these topics within her blogging platform.",
    "images/elouizauplifts.jpg",
    "images/elouizauplifts-phone.jpg",
    "images/elouizupliftsbg.png",
    "http://www.elouizauplifts.co.uk/"

    )
);




$skillsArr = Array(
  new Skills("HTML", 80),
  new Skills("CSS", 70,),
  new Skills("Javascript", 70),
  new Skills("PHP", 30),
  new Skills("Typescript", 60),
  new Skills("SCSS", 70),
  new Skills("Angular", 40)
);


?>

<?php include 'header.php'?>
<div class="site__wrapper">
    <nav class="nav">
        <div class="hamburger__wrapper">
            <div class="hamburger__line js-hamLine1"></div>
            <div class="hamburger__line js-hamLine2"></div>
            <div class="hamburger__line js-hamLine3"></div>

        </div>
        <div class="mob-nav__wrapper">
            <ul >
                <li class="mob-nav__link"><a href="contact-form">CONTACT FORM</a></li>
                <li class="mob-nav__link--close">Close</li>
            </ul>
        </div>
        
    </nav>
        <section class="hero">
            <svg class="hero__img--small">
                <use xlink:href="svg/svgsprite.svg#hero-face-small"></use>
            </svg>
        </section>
        
    </div>

    <section class="about-me__section">
        <div class="about-me__wrapper">
            <h3 class="about-me__title">HI, I'M MICHAEL GRANIL</h3>
            <div class="about-me__content">
                <svg class="about-me__content--icon">
                      <use xlink:href="svg/svgsprite.svg#responsive"></use>
                </svg>
                <p class="about-me__content--text">
                I am a self taught Web Developer with a couple of years experience, a career path I love. I aim to create clean, personal, unique websites to remove ambiguous identity for my clients in the digital world. When I’m not coding I’m a busy dad, at the gym or playing FIFA online….
                <br><br>
                Where am I now? You’ll find me at InPhase Ltd working as a Front End Developer for a software company that delivers a performance managment tool!
                </p>
                

            </div>
        </div>
    </section>

    <section class="skills__section">
        <div class="skills__wrapper">
            <h3 class="skills__wrapper-title">LANGUAGES I KNOW</h3>
            <?php foreach($skillsArr as $skill) :?>

            <div class="a-skill__wrapper">
                <input class="js-skill__value" type="hidden" value="<?php echo $skill->value?>">
                <progress class="js-progress-bar" max="100" value=""></progress>
                <span class="a-skill__text"><?php echo $skill->name?></span>
                <div class="a-skill__percentage-wrapper"><span class="a-skill__percentage-number"></span><span class="a-skill__percentage-sign">%</span> </div>
            </div>
            <?php endforeach;?>
         
        </div>
    </section>

    <section class="recent-work__section">
        <div class="recent-work__wrapper">
            <h3 class="recent-work__wrapper-title">RECENT WORK</h3>
            <?php foreach($projectArray as $project):?>
                <div class="a-proj__wrapper" style="background-image: url('<?php echo $project->bgImg?>')">
                <div class="a-proj__images">
                    <div class="a-proj__images--screenshot">
                    <img src="<?php echo $project->desktopImg?>" alt="">
                    </div>
                    
                    <div class="a-proj__images--phone">
                        <img src="<?php echo $project->phoneImg?>" alt="">
                        <span class="phone__shadow"></span>
                    </div>
                    
                </div>
                <div class="a-proj__details">
                    <div class="project-skills">
                        <?php foreach ($project->skillsUsed as $aSkill){
                             echo "<span>$aSkill</span>";
                        }
                           
                            ?>
                    </div>
                    <h5 class="project-title"><a href="<?php echo $project->link?>"><?php echo $project->name?></a></h5>
                    <p class="project-text">
                  <?php echo $project->text?>
                    </p>
                </div>
            </div>

        </div>

                <?php endforeach?>
        </div>
</section>

<?php include 'footer.php'?>