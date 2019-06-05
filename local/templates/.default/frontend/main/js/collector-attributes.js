function collectorAttributes(e) {
	let attributes = null;
	if (typeof(e.target) == 'undefined') {
		attributes = e.attributes;
	} else {
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