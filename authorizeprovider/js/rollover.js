function over_gif(target) {
	var off = target.src;
	target.src = off.substring(0,off.indexOf('_'))+'_on.gif	';
}

function out_gif(target) {
	var off = target.src;
	target.src = off.substring(0,off.indexOf('_'))+'_off.gif	';
} 

function over_png(target) {
	var off = target.src;
	target.src = off.substring(0,off.indexOf('_'))+'_on.png	';
}

function out_png(target) {
	var off = target.src;
	target.src = off.substring(0,off.indexOf('_'))+'_off.png	';
} 

