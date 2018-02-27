<h1 style="text-align:center">Roy's Laboratory Website Documentation</h1>

# Table of Content
- [Table of Content](#table-of-content)
    - [Accounts Login Information](#accounts-login-information)
    - [Homepage Carousel Pictures](#homepage-carousel-pictures)
        - [Editting the first 2 images](#editting-the-first-2-images)
        - [Editting images after the first 2](#editting-images-after-the-first-2)
    - [Pictures/Albums](#picturesalbums)
    - [Members](#members)
    - [News (Post)](#news-post)
    - [Publication](#publication)

## Accounts Login Information
* [Bluehost Hosting](https://my.bluehost.com/cgi-bin/cplogin) 
    * ID: roylaboratory.com
* [Wordpress Admin Page](https://roylaboratory.com/wp-admin/)
    * ID: roy@olemiss.edu
* [Bluehost Email](https://login.bluehost.com/hosting/webmail)
    * ID: contact@roylaboratory.com
* Gmail
    * ID: Roylab2017@gmail.com

## Homepage Carousel Pictures
### Editting the first 2 images
* **Notes:** This can be done on the Wordpress Admin page
* On the Wordpress Admin page:
    * Go to Appearance -> Customize
    * Go to Slider
    * From there, you can easily add/remove pictures, edit title, link on button,...
    * Make sure to click "Publish" after your edit
### Editting images after the first 2
* **Notes:** This should be done by someone who knows how to code. There's no way to find out if your code has bugs or not while editting on the Wordpress Admin page, so make sure to edit with caution. Once you submmit the code, if it has some bugs, the whole site will crash and become unaccessible through the Admin page.
* First, upload the picture you want for your new slide by following these steps
    * Using a FTP program (like FileZilla), connect to our web server with these info:
        * Host: 50.87.249.193
        * Username: developer@roylaboratory.com
        * Password: [Same password for every other account, ask Dr. Roy]
        * Port: 21
    * Go to public_html -> wp-content -> themes -> agama -> assets -> img
    * Within the img folder, drag in (upload) the image you want your slider to have
    * **Remember** the file name of this image for adding in the code later
* Once you upload your image, in the Wordpress Admin page:
    * Go to Appearance -> Editor
    * Find and click on ```class-agama-slider.php``` in the **Theme Files** column to the right. It should be under *framework*.
    * Click **Proceed** button
    * There are two text-editor boxes, you can use the one below for better code visual.
* Once you have access to edit the file, follow these steps to Add/Remove/Edit slides:
    * 1st: add/edit/remove the code to **initialize the variables** for the slides. The code looks like this
    ```php
    # Slide 3
    $slide['3']['img']          = esc_url( get_theme_mod( 'agama_slider_image_3', AGAMA_IMG . 'IMG_6447.jpg' ) );
	$slide['3']['title']        = esc_attr( get_theme_mod( 'agama_slider_title_3', 'Explore Our Campus' ) );
	$slide['3']['animate']      = esc_attr( get_theme_mod( 'agama_slider_title_animation_3', 'bounceInLeft' ) );
	$slide['3']['title_color']  = esc_attr( get_theme_mod( 'agama_slider_title_color_3', '#fff' ) );
	$button['3']['title']       = esc_attr( get_theme_mod( 'agama_slider_button_title_3', 'Learn More' ) );
	$button['3']['animate']     = esc_attr( get_theme_mod( 'agama_slider_button_animation_3', 'bounceInRight' ) );
	$button['3']['url']         = esc_url( get_theme_mod( 'agama_slider_button_url_3', '#' ) );
    ```
    * You should only the change the values of ```$slide['3']['img']```, ```$slide['3']['title']```, ```$button['3']['title'] ``` and ```$button['3']['url']```. **Use the filename of the image you just uploaded** and replace it in ```$slide['3']['img']```, after ```AGAMA_IMG . ```
    * 2nd: add/edit/remove the code to **render the new slide**. Make sure you have all the variables name correct.
    ```php
    // Extra code to render slider 3
    if( $slide['3']['img'] ) {
        echo '<div data-src="'. $slide['3']['img'] .'">';
            echo '<div class="slide-content slide-3">';
                echo '<div class="slide-content-cell">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 col-sm-12 col-xs-12">';
                                if( $slide['3']['title'] ) {
                                    echo '<h2 class="slide-title animated '. $slide['3']['animate'] .'" style="color:'. $slide['3']['title_color'] .';">';
                                        echo $slide['3']['title'];
                                    echo '</h2>';
                                }
                                if( $button['3']['title'] ) {
                                    echo '<a href="'. $button['3']['url'] .'" class="button button-3d button-rounded button-xlarge animated '. $button['3']['animate'] .'">';
                                        echo $button['3']['title'];
                                    echo '</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    // End extra code for slider 3
    ```
    * Double check everything, and click **Update File** button in the bottom of the page


## Pictures/Albums
**Notes:** We're using ```Gallery by Supsystic``` as the plugin for our [gallery](https://roylaboratory.com/gallery/) page.
* On the Admin page, go to Gallery by Supsystic -> Galleries. You should see 5 main galleries:
    * Lab Tour
    * Around the Lab
    * Outside the Lab
    * Memorable Momemts
    * Category: this gallery acts as the thumbnail for our main album. There are for pictures

## Members


## News (Post)


## Publication