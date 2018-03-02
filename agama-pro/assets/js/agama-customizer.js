(function ($) {
    
	"use strict";
	
    if ('undefined' !== typeof themevision) {
        var wiki = $('<a class="themevision-wiki-link"></a>')
            .attr('href', themevision.wikiURL)
            .attr('target', '_blank')
            .text(themevision.wikiLabel)
            .css({
                'display': 'inline-block',
                'background-color': 'rgb(162, 198, 5)',
                'color': '#fff',
                'text-transform': 'uppercase',
                'margin-top': '6px',
                'padding': '3px 6px',
                'font-size': '9px',
                'letter-spacing': '1px',
                'line-height': '1.5',
                'clear': 'both'
            })
		;
		var support = $('<a class="themevision-support-link"></a>')
			.attr('href', themevision.supportURL)
			.attr('target', '_blank')
			.text(themevision.supportLabel)
			.css({
                'display': 'inline-block',
                'background-color': 'rgb(162, 198, 5)',
                'color': '#fff',
                'text-transform': 'uppercase',
                'margin-top': '6px',
                'padding': '3px 6px',
                'font-size': '9px',
                'letter-spacing': '1px',
                'line-height': '1.5',
				'float': 'right'
            })
		;
        setTimeout(function () {
            $('.preview-notice').append(wiki);
			$('.preview-notice').append(support);
            $('.customize-panel-back').css('height', '97px');
        }, 200);
        // Remove accordion click event
        $('.themevision-wiki-link').on('click', function (e) {
            e.stopPropagation();
        });
		$('.themevision-support-link').on('click', function (e) {
            e.stopPropagation();
        });
    }
})(jQuery);