<style>
    a{
        text-decoration: none;
    }
    #testimonials{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width:100%;
    } 
    .testimonial-heading{
        letter-spacing: 1px;
        margin: 30px 0px;
        padding: 10px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
     
    .testimonial-heading span{
        font-size: 1.3rem;
        color: #252525;
        margin-bottom: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    /* .testimonial-box-container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width:100%;
    } */
    .testimonial-box{
        width:100%;
        box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
        background-color: #ffffff;
        padding: 20px;
        margin: 15px;
        cursor: pointer;
    }
    .profile-img{
        width:50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
    }
    .profile-img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    .profile{
        display: flex;
        align-items: center;
    }
    .name-user{
        display: flex;
        flex-direction: column;
    }
    .name-user strong{
        color: #3d3d3d;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }
    .name-user span{
        color: #979797;
        font-size: 0.8rem;
    }
    .reviews{
        color: #f9d71c;
    }
    .box-top{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .client-comment p{
        font-size: 0.9rem;
        color: #4b4b4b;
    }
    .testimonial-box:hover{
        transform: translateY(-10px);
        transition: all ease 0.3s;
    }
     
    @media(max-width:1060px){
        .testimonial-box{
            width:45%;
            padding: 10px;
        }
    }
    @media(max-width:790px){
        .testimonial-box{
            width:100%;
        }
        .testimonial-heading h1{
            font-size: 1.4rem;
        }
    }
    @media(max-width:340px){
        .box-top{
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .reviews{
            margin-top: 10px;
        }
    }
    ::selection{
        color: #ffffff;
        background-color: #252525;
    }



    /*  */
    .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .activity-card {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .activity-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .activity-description {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
    </style>
    @include('layouts.head')
    
    <div data-elementor-type="wp-page" data-elementor-id="1173" class="elementor elementor-1173">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-1fc04b3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1fc04b3" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-background-overlay"></div>
            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c3bc530" data-id="c3bc530" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-0c3e812 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0c3e812" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-no">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-876c540" data-id="876c540" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-696a29c animated-slow elementor-invisible elementor-widget elementor-widget-jkit_heading" data-id="696a29c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="jkit_heading.default">
                                            <div class="elementor-widget-container">
                                                <div class="jeg-elementor-kit jkit-heading  align-left align-tablet- align-mobile-center jeg_module_1173_3_632ca94d76690">
                                                    <div class="heading-section-title ">
                                                        <h2 class="heading-title">Upcoming <span class="style-gradient"><span>Events</span></span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d117da7" data-id="d117da7" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-3dc6910 elementor-icon-list--layout-inline elementor-widget__width-auto animated-slow elementor-mobile-align-center elementor-list-item-link-full_width elementor-invisible elementor-widget elementor-widget-icon-list"
                                            data-id="3dc6910" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="icon-list.default">
                                            <div class="elementor-widget-container">
                                                <link rel="stylesheet" href="plugins/elementor/assets/css/widget-icon-list.min.css">
                                                <ul class="elementor-icon-list-items elementor-inline-items">
                                                    <li class="elementor-icon-list-item elementor-inline-item">
                                                        <span class="elementor-icon-list-text">Home</span>
                                                    </li>
                                                    <li class="elementor-icon-list-item elementor-inline-item">
                                                        <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="jki jki-chevron-right-solid"></i>						</span>
                                                        <span class="elementor-icon-list-text">Our Events</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <section 
         class="elementor-section elementor-top-section elementor-element elementor-element-c14718f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c14718f" data-element_type="section">
            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a604ae7" data-id="a604ae7" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">            
                        <div class="elementor-section">
                            <h1 class="elementor-heading-title">Restoration Festival 2023</h1>
                        </div>
                        <div class="elementor-element">
                            <h4>
                                A reflection of our commitment to creating a space where the conversation 
                                around mental health is normalized, where emotional expression is celebrated, 
                                and where individuals can come together to learn, grow, and heal.
                            ​</h4>
                            
                            <h4>
                                A mental wellness festival can be a catalyst for transformation, 
                                a reminder that emotional well-being is a shared responsibility, 
                                and a celebration of the strength that emerges from open conversations 
                                and supportive communities.
                            </h4>
                        </div>
                        <div class="elementor-element">
                            <h4>
                                Date: <p>7th and 8th October 2023</p>
                            ​</h4>
                            
                            <h4>
                                Venue: <p>T3C Gardens, Lilayi Rd, Lilayi</p>
                            </h4>
                            <h4>
                                Time: <p>09:00hrs to 17:00hrs</p>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="background-color: #d6ae91;
        background-image: url('https://images.pexels.com/photos/1080471/pexels-photo-1080471.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); /* Replace with your image URL */
        background-size: cover;
        background-position: center;"
         class="elementor-section elementor-top-section elementor-element elementor-element-c14718f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c14718f" data-element_type="section">
            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a604ae7" data-id="a604ae7" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">      
                        
                        <div class="elementor-element">
                            <h4 style="color: #d1c1b5">Promoting Awareness and Reducing Stigma</h4>
                            <p style="color: #fff">
                                By openly discussing and engaging in activities that focus on emotional well-being, 
                                the festival contributes to normalizing conversations about mental health.
                            ​</p>
                            <br>
                            <h4 style="color: #d1c1b5">Building Community Resilience:</h4>
                            <p style="color: #fff">
                                Engaging in shared experiences and open conversations fosters connections, 
                                reduces feelings of isolation. ​
                            </p>
                            <br>
                            <h4 style="color: #d1c1b5">Empowerment</h4>
                            <p style="color: #fff">
                                Participants leave the festival with a toolkit of strategies 
                                to improve their mental well-being.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a604ae7" data-id="a604ae7" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">            
                        <div class="elementor-section">
                            <div class="elementor-container text-center" style="text-align: center; padding-left:8%; padding-top:15%">
                                <h2 class="elementor-heading-title">Benefits of Rest Fest 2023</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-5cd5314 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5cd5314" data-element_type="section">

            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a604ae7" data-id="a604ae7" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">            
                    <div class="elementor-section items:center" style="text-align: center; margin:auto; padding-top:5%;padding-bottom:5%;">
                        <div class="elementor-container text-center">
                            <h2 class="elementor-heading-title">Activities</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-container elementor-column-gap-no container">
                <div class="grid-container">
                    <div class="activity-card">
                        <h4 class="activity-title">Yoga</h4>
                        <p class="activity-description">
                            Revitalising yoga sessions led by an experienced yoga instructor to help participants
                            connect with their body, mind, and soul
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Meditation</h4>
                        <p class="activity-description">
                            Practising mindfulness through meditation, promoting mental clarity and emotional well-being.
                            Participants will learn different mindfulness techniques that can be practised from the comfort
                            of their homes or office to help with stress or anxiety relief
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Rage Room</h4>
                        <p class="activity-description">
                            Release pent-up stress and negative emotions in our specially designed rage room. Letting go of
                            tension through smashing breakable items can be incredibly cathartic and freeing. We will also be
                            providing emotion and stress management worksheets and guides for those who participate in the
                            rage room
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Painting and Pottery Sessions</h4>
                        <p class="activity-description">
                            Exploring the creative side in painting and pottery workshops. Engaging in artistic expression can be
                            a powerful way to reduce stress, tap into emotions, and discover new ways of self-expression.
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Plant-Making</h4>
                        <p class="activity-description">
                            Learning the art of plant propagation by creating a terrarium or plant arrangement. Bringing nature
                            into the living space can promote tranquility and enhance the overall ambiance
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Access to Psychologists</h4>
                        <p class="activity-description">
                            Our team of compassionate psychologists will be available throughout the event to provide
                            counselling and support for those seeking professional guidance or simply a listening ear.
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Sauna and Swimming</h4>
                        <p class="activity-description">
                            The blissful experience of the sauna and access to a refreshing pool to unwind and cool off
                            during the event. Swimming is an excellent exercise to enhance mood and reduce stress.
                        </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Access to Fishing Ponds</h4>
                        <p class="activity-description">Immersion in the soothing embrace of nature's waters. The act of fishing requires patience,
                            focus, and a sense of quiet determination—qualities that cultivate a serene mind and a
                            balanced spirit.</p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Massage</h4>
                        <p class="activity-description">Relaxing massages are available from certified therapists designed to relieve physical tension
                            and promote a deep sense of relaxation.
                            </p>
                    </div>
                    <div class="activity-card">
                        <h4 class="activity-title">Tai Chi</h4>
                        <p class="activity-description">Tai Chi seamlessly combines gentle, flowing movements with focused breathing and
                            mindfulness. This discipline fosters a sense of tranquility and inner calm, making it a soothing
                            and meditative experience that gently eases away stress and tension.</p>
                    </div>
                    <!-- Repeat the above activity-card blocks for each activity -->
                </div>
            </div>
        </section>

        {{--<section style="padding-top: 2%" class="elementor-section elementor-inner-section elementor-element elementor-element-5cd5314 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5cd5314" data-element_type="section">
 
            <div class="elementor-container elementor-column-gap-no container">

            </div>
        </section> --}}
        
    </div>
    @include('layouts.footer')