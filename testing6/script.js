$(function() {

    // RESIZE RESETS
    $(window).resize(function() {
        posFilterBar($('.filter').first());
    });

    $(window).on('scroll', function() {
        var pos = $(window).scrollTop();
        var pos2 = pos + 50;
        var scrollBottom = pos + $(window).height();

        if (!isMobile) {
            if (pos >= navPos + $('nav').height() && lastPos < pos) {
                $('nav').addClass('fixed');
            }
            if (pos < navPos && lastPos > pos) {
                $('nav').removeClass('fixed');
            }
            lastPos = pos;
        }

        // Link Highlighting
        if (pos2 > $('#home').offset().top) {
            highlightLink('home');
        }
        if (pos2 > $('#about').offset().top) {
            highlightLink('about');
        }
        if (pos2 > $('#portfolio').offset().top) {
            highlightLink('portfolio');
        }
        if (pos2 > $('#blog').offset().top) {
            highlightLink('blog');
        }
        if (
            pos2 > $('#contact').offset().top ||
            pos + $(window).height() === $(document).height()
        ) {
            highlightLink('contact');
        }

        // Prevent Hover on Scroll
        clearTimeout(lockTimer);
        if (!$('body').hasClass('disable-hover')) {
            $('body').addClass('disable-hover');
        }

        lockTimer = setTimeout(function() {
            $('body').removeClass('disable-hover');
        }, 500);
    });

    function highlightLink(anchor) {
        $('nav .active').removeClass('active');
        $('nav')
            .find('[dest="' + anchor + '"]')
            .addClass('active');
    }

    // EVENT HANDLERS
    $('.page-link').click(function() {
        var anchor = $(this).attr('dest');
        $('.link-wrap').removeClass('visible');

        $('nav span').removeClass('active');
        $('nav')
            .find('[dest="' + anchor + '"]')
            .addClass('active');

        $('html, body').animate(
            {
                scrollTop: $('#' + anchor).offset().top
            },
            400
        );
    });

    $('.mdi-menu').click(function() {
        $('.link-wrap').toggleClass('visible');
    });

    $('.blog-wrap').hover(
        function() {
            $('.blog-wrap')
                .not(this)
                .addClass('fade');
            $(this).addClass('hover');
        },
        function() {
            $(this).removeClass('hover');
            $('.blog-wrap').removeClass('fade');
        }
    );

    posFilterBar($('.filter').first());

    $('.filter').click(function() {
        posFilterBar(this);
    });

    function posFilterBar(elem) {
        var origin = $(elem)
            .parent()
            .offset().left;
        var pos = $(elem).offset().left;
        $('.float-bar').css({
            left: pos - origin,
            width: $(elem).innerWidth()
        });
        $('.float-bar .row').css('left', (pos - origin) * -1);
    }

});
