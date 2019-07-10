'use strict'


function interceptRequest({ newMethod, newUrl, userId, statusCode }){
    const oldXML = XMLHttpRequest.prototype.open
        XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
            oldXML.call(this, newMethod, newUrl, async, user, pass);
            this.setRequestHeader("user_id", userId);
            this.setRequestHeader("statuscode", statusCode)
        };
        
}



module.exports = {
    interceptRequest
}