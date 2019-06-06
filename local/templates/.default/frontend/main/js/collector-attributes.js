function collectorAttributes(e) {
	let attributes = null;
	if (typeof(e.target) == 'undefined') {
		// eslint-disable-next-line prefer-destructuring
		attributes = e.attributes;
	} else {
		// eslint-disable-next-line prefer-destructuring
		attributes = e.target.attributes;
	}

	var dataAttr = {};

	for (var i=0; i<attributes.length; i++) {
		if (attributes[i].name.slice(0, 4) == 'data') {
			dataAttr[attributes[i].name.slice(5)] = attributes[i].value;
		}
	}
	return dataAttr;
}

export default collectorAttributes;