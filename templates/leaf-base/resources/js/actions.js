$(document).ready(function() {

    $("body").addClass('js');
    
    windowScroll = {
        config: {
            targetElems: $(".js-scroll-btn"),
            speed: 350
        },

        init: function() {
          var config = this.config;

            // Check if elements exist
            if (config.targetElems.length) {
                this.bindButtons( config );
            }

        },
        bindButtons: function( config ) {
            var buttons = config.targetElems;

            $(document.body).on("click", ".js-scroll-btn", function( e ) {

                var data = $(this).data('scroll'),
                    destination = $(".js-scroll-dest[data-scroll='" + data + "']"),
                    offset = destination.offset();

                // Prevent Click
                e.preventDefault();

                // Animate
                windowScroll.animateScroll( offset );

            });
        },
        animateScroll: function( offset ) {

            $('html, document').animate({
                scrollTop: offset.top - 20
            }, this.config.speed);

        }
    };

    homeSlider = {
        config: {
            targetElems: $(".js-slider"),
            pluginOptions: {
                "controlNav": true,
                "directionNav": false,
                "slideshowSpeed": 12000
            }
        },

        init: function() {
            var config = homeSlider.config;

            if ( config.targetElems.length ) {
                $.get("/templates/leaf-base/resources/js/jquery.flexslider.js")
                    .done(function() {
                        homeSlider.callSlider();
                    }).fail(function() {
                        config.targetElems.hide();
                    });
            }

        },

        callSlider: function() {
            var context = homeSlider.config;

            context.targetElems.flexslider( context.pluginOptions );
        }
    };

    tabbedWidget = {
        config: {
            targetElems: $(".tabs"),
            currentClass: "is-current"
        },

        init: function() {
            var context = this.config,
                revealNavItem = context.targetElems.find("[data-reveal]");

            if ( context.targetElems.length ) {

                revealNavItem.on("click", function( e ) {
                    tabbedWidget.revealTab.call($(this), revealNavItem);
                    e.preventDefault();
                });

            }
        },

        revealTab: function( item ) {
            var thisButton = $(this),
                thisData = thisButton.data("reveal"),
                context = tabbedWidget.config,
                tab = context.targetElems.find(".tab");

            // Handles the classes on the navigation

            if ( !thisButton.hasClass( context.currentClass ) ) {
                // Remove is-current class from nav item
                item.removeClass( context.currentClass );

                // Add is-current class to item clicked
                thisButton.addClass( context.currentClass );
            }

            // Handles Revealing Tabs
            if ( tab.hasClass( context.currentClass ) ) {
                tab.removeClass( context.currentClass );
            }

            context.targetElems.find("#" + thisData).addClass( context.currentClass );

        }
    };

    responsiveNav = {
        config: {
            targetElems: $(".mobile-nav"),
            screenSize: $(window).width(),
            currentClass: "is-expanded",
            breakPoint: 767,
            initVars: {
                logo: $(".logo img"),
                logoAttr: $(".logo img").attr('src'),
                newLogoString: "/images/logo-small.png"
            }
        },

        init: function() {
            var config = responsiveNav.config,
                screenSize = config.screenSize;

            if ( config.targetElems.length ) {

                responsiveNav.toggleNav();

                if ( screenSize <= config.breakPoint ) {
                    this.updateNav();
                    this.windowResize();
                } else {
                    responsiveNav.windowResize();
                }

            }

        },

        windowResize: function() {

            var configInitVars = responsiveNav.config.initVars;
                config = responsiveNav.config;

            $( window ).on("resize", function() {

                screenSize = $(window).width();

                if ( !(configInitVars.logoAttr === configInitVars.newLogoString) && screenSize <= config.breakPoint ) {
                    
                    responsiveNav.updateNav();
                
                } else if ( screenSize >= (config.breakPoint - 1) ) {

                    // Update the Logo - Needs to check if there was a logo to update
                    configInitVars.logo.attr('src', configInitVars.logoAttr);

                    // Hide Menu Button
                    config.targetElems.addClass('is-hidden');

                    // Hide Menu
                    $(".main-nav--container").removeClass( config.currentClass );

                }

            });

        },

        updateNav: function() {
            var configInitVars = responsiveNav.config.initVars;

            configInitVars.logo.attr('src', configInitVars.newLogoString);
            responsiveNav.config.targetElems.removeClass('is-hidden');
        },

        toggleNav: function() {
            var configInitVars = responsiveNav.config.initVars,
                config = responsiveNav.config;

            responsiveNav.config.targetElems.on("click", function() {
                $(".main-nav--container").toggleClass( config.currentClass );
            });
        }

    };

    // Call the script
    homeSlider.init();
    windowScroll.init();
    tabbedWidget.init();
    responsiveNav.init();

});
