(function(window, document, $) {
    'use strict';

    /*=========================================================================================
    File Name: Popup dialog JS
    ==========================================================================================*/
    // onShow event
    $('#onshowbtn').on('click', function() {
        $('#onshow').on('show.bs.modal', function() {
            alert('onShow event fired.');
        });
    });

    // onShown event
    $('#onshownbtn').on('click', function() {
        $('#onshown').on('shown.bs.modal', function() {
            alert('onShown event fired.');
        });
    });

    // onHide event
    $('#onhidebtn').on('click', function() {
        $('#onhide').on('hide.bs.modal', function() {
            alert('onHide event fired.');
        });
    });

    // onHidden event
    $('#onhiddenbtn').on('click', function() {
        $('#onhidden').on('hidden.bs.modal', function() {
            alert('onHidden event fired.');
        });
    });

    /*=========================================================================================
        File Name: Checkbox JS
    ==========================================================================================*/
    var $html = $('html');

    /*  Checkbox & Radio Styles Starts   */
    $('.colors li').on('click', function() {
        var self = $(this);
        if (!self.hasClass('active')) {
            self.siblings().removeClass('active');

            var skin = self.closest('.skin'),
                color = self.attr('class') ? '-' + self.attr('class') : '',
                checkbox = skin.data('icheckbox'),
                radio = skin.data('iradio'),
                checkbox_default = 'icheckbox_minimal',
                radio_default = 'iradio_minimal';

            if (skin.hasClass('skin-square')) {
                checkbox_default = 'icheckbox_square';
                radio_default = 'iradio_square';
                checkbox === undefined && (checkbox = 'icheckbox_square-red', radio = 'iradio_square-red');
            }

            if (skin.hasClass('skin-flat')) {
                checkbox_default = 'icheckbox_flat';
                radio_default = 'iradio_flat';
                checkbox === undefined && (checkbox = 'icheckbox_flat-green', radio = 'iradio_flat-green');
            }

            if (skin.hasClass('skin-line')) {
                checkbox_default = 'icheckbox_line';
                radio_default = 'iradio_line';
                checkbox === undefined && (checkbox = 'icheckbox_line-blue', radio = 'iradio_line-blue');
            }

            checkbox === undefined && (checkbox = checkbox_default, radio = radio_default);

            skin.find('input, .skin-states .state').each(function() {
                var element = $(this).hasClass('state') ? $(this) : $(this).parent(),
                    element_class = element.attr('class').replace(checkbox, checkbox_default + color).replace(radio, radio_default + color);
                /*console.log(element);
                console.log(element_class);*/
                element.attr('class', element_class);
            });

            skin.data('icheckbox', checkbox_default + color);
            skin.data('iradio', radio_default + color);
            self.addClass('active');
        }
    });

    $('.skin-line input').each(function(){
        var self = $(this),
            label = self.next(),
            label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
    // Checkbox & Radio 2
    $('.icheck_minimal input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
    });

    // Square Checkbox & Radio
    $('.skin-square input').iCheck({
        checkboxClass: 'icheckbox_square-red',
        radioClass: 'iradio_square-red',
    });
    //Flat Checkbox & Radio
    $('.skin-flat input').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
    // Polaris Checkbox & Radio
    $('.skin-polaris input').iCheck({
        checkboxClass: 'icheckbox_polaris',
        radioClass: 'iradio_polaris',
        increaseArea: '-10%'
    });
    // Futurico Checkbox & Radio
    $('.skin-futurico input').iCheck({
        checkboxClass: 'icheckbox_futurico',
        radioClass: 'iradio_futurico',
        increaseArea: '20%'
    });
    /*  Checkbox & Radio Styles Ends   */

    /*=========================================================================================
        File Name: Pagination JS
    ==========================================================================================*/
    $('.page1-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: null,
        last: null,
        onPageClick: function (event, page) {
            $('#page1-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });

    $('.page2-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: null,
        last: null,
        onPageClick: function (event, page) {
            $('#page2-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });

    $('.page3-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: null,
        last: null,
        onPageClick: function (event, page) {
            $('#page3-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.firstLast1-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        onPageClick: function (event, page) {
            $('#firstLast1-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });

    $('.firstLast2-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        onPageClick: function (event, page) {
            $('#firstLast2-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });

    $('.firstLast3-links').twbsPagination({
        totalPages: 5,
        visiblePages: 4,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        onPageClick: function (event, page) {
            $('#firstLast3-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });

    $('.start-links').twbsPagination({
        totalPages: 10,
        visiblePages: 6,
        startPage : 5,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        onPageClick: function (event, page) {
            $('#start-content').text('Your start Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.loop-links').twbsPagination({
        totalPages: 5,
        visiblePages: 5,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        loop: true,
        onPageClick: function (event, page) {
            $('#loop-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.url-links').twbsPagination({
        totalPages: 10,
        visiblePages: 5,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        href: '?page={{page}}',
        onPageClick: function (event, page) {
            $('#url-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.url1-links').twbsPagination({
        totalPages: 10,
        visiblePages: 5,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        href: '?page={{page}}&#url1-content',
        hrefVariable: '{{page}}',
        onPageClick: function (event, page) {
            $('#url1-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.synchronized-links').twbsPagination({
        totalPages: 15,
        visiblePages: 6,
        prev: 'Prev',
        first: 'First',
        last: 'Last',
        onPageClick: function (event, page) {
            $('#synchronized-content').text('You are on Page ' + page);
            $(".pagination").find('li').addClass('page-item');
            $(".pagination").find('a').addClass("page-link");
        }
    });
    $('.default-paginator').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
    });

    //  Format
    $('.paginator-format').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        text: 'Do<br>ddd'
    });

    // Hide calendar
    $('.paginator-calendar').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        showCalendar: false
    });


    // Highlight date
    $('.paginator-highlight').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        highlightSelectedDate: false
    });


    // Highlight today's date
    $('.paginator-highlight-today').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        highlightToday: false
    });


    // Change Selected Date
    $('.paginator-selectedDate').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        selectedDate: moment().add(10, 'days')
    });

    // Hide OffDays
    $('.paginator-showoffDays').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        showOffDays: false
    });

    // Change OffDays
    $('.paginator-offDays').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        offDays: 'Sun'
    });

    // Hide StartOfWeek Use divider
    $('.paginator-showStartOfWeek').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        showStartOfWeek: false
    });

    // Hint
    $('.paginator-hint').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        hint: 'Do MMMM YYYY'
    });

    // Small Size
    $('.paginator-small').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        size: 'small'
    });

    // Large Size
    $('.paginator-large').datepaginator({
        itemWidth: 60,
        navItemWidth: 20,
        size: 'large'
    });

})(window, document, jQuery);