/**
 * Conditional logic for CMB2 library
 * @author    Awran5 <github.com/awran5>
 * @version   1.0.0
 * @license   under GPL v2.0 (https://github.com/awran5/CMB2-conditional-logic/blob/master/LICENSE)
 * @copyright © 2018 Awran5. All rights reserved.
 *
 */
(function(a){'use strict';function b(){a('[data-conditional-id]').each((c,d)=>{function e(k){return g.includes(k)&&''!==k}let f=d.dataset.conditionalId,g=d.dataset.conditionalValue,h=d.closest('.cmb-row'),j=h.classList.contains('cmb-repeat-group-field');if(j){let k=h.closest('.cmb-repeatable-group').getAttribute('data-groupid'),l=h.closest('.cmb-repeatable-grouping').getAttribute('data-iterator');f=`${k}[${l}][${f}]`}a('[name="'+f+'"]').each(function(k,l){'select-one'===l.type?(!e(l.value)&&a(h).hide(),a(l).on('change',function(m){e(m.target.value)?a(h).show():a(h).hide()})):'radio'===l.type?(!e(l.value)&&l.checked&&a(h).hide(),a(l).on('change',function(m){e(m.target.value)?a(h).show():a(h).hide()})):'checkbox'===l.type&&(!l.checked&&a(h).hide(),a(l).on('change',function(m){m.target.checked?a(h).show():a(h).hide()}))})})}b(),a('.cmb2-wrap > .cmb2-metabox').on('cmb2_add_row',function(){b()})})(jQuery);