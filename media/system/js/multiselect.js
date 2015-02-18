<<<<<<< HEAD
/*
        GNU General Public License version 2 or later; see LICENSE.txt
*/
(function(b){Joomla=window.Joomla||{};var a;Joomla.JMultiSelect=function(f){var e,c=function(g){a=b("#"+g).find("input[type=checkbox]");a.on("click",function(h){d(h)})},d=function(j){var h=b(j.target),l,k,g,i;if(j.shiftKey&&e.length){l=h.is(":checked");k=a.index(e);g=a.index(h);if(g<k){i=k;k=g;g=i}a.slice(k,g+1).attr("checked",l)}e=h};c(f)}})(jQuery);
=======
/**
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * JavaScript behavior to allow shift select in administrator grids
 */
(function() {
	Joomla = Joomla || {};

	Joomla.JMultiSelect = new Class({
		initialize : function(table) {
			this.table = document.id(table);
			if (this.table) {
				this.boxes = this.table.getElements('input[type=checkbox]');
				this.boxes.addEvent('click', function(e){
					this.doselect(e);
				}.bind(this));
			}
		},

		doselect: function(e) {
			var current = document.id(e.target);
			if (e.shift && typeOf(this.last) !== 'null') {
				var checked = current.getProperty('checked') ? 'checked' : '';
				var range = [this.boxes.indexOf(current), this.boxes.indexOf(this.last)].sort(function(a, b) {
					//Shorthand to make sort() sort numerical instead of lexicographic
					return a-b;
				});
				for (var i=range[0]; i <= range[1]; i++) {
					this.boxes[i].setProperty('checked', checked);
				}
			}
			this.last = current;
		}
	});
})();
>>>>>>> FETCH_HEAD
