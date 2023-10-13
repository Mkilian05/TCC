function base(){[native/code]}

base.loading = {show:ko.observable(false)};

base.Auth = {!! !empty(session()->has('user') ) ? json_encode(session()->get('user')) : json_encode(new stdClass) !!};

base._urlBase = "@php echo config('app.url'); @endphp"

base.getHeaders = function(){
    return {
    //'X-CSRF-TOKEN':"{{csrf_token()}}",
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    'Authorization': 'Bearer ' + base.Auth.token || '',/* Se a rota exigir token de acesso*/
    'Accept': 'application/json; charset=UTF-8'
    }
};

base.post = function(url,payload,callback,loading)
{
   /*let headers = {
    'X-CSRF-TOKEN':"{{csrf_token()}}"
    }*/
    let headers = base.getHeaders();
    if(!loading) base.loading.show(true);
    $.ajax({
        url:url,
        data:payload,
        dataType:'json',
        method:'post',
        headers:headers
    }).done(function(response){
        if(typeof(callback) == 'function') callback(response);
    }).fail(function(err){
        {{--  debugger;  --}}
        console.log(err);
        if(err.status == 422)
        {
            base.handle_formRequest(err.responseJSON.errors);
        }else{
            showMessage('Ocorreu um erro, contate o administrador do sistema!!!', 'error');
        }
    }).always(function(){
        if(!loading) base.loading.show(false);
    });
}

base.get = function(url,payload,callback,loading)
{
   /*let headers = {
    'X-CSRF-TOKEN':"{{csrf_token()}}"
    }*/
    let headers = base.getHeaders();
    if(!loading) base.loading.show(true);
    $.ajax({
        url:url,
        data:payload,
        dataType:'json',
        method:'get',
        headers:headers
    }).done(function(response){
        if(typeof(callback) == 'function') callback(response);
    }).fail(function(err){
        console.log(err);
        showMessage('Ocorreu um erro, contate o administrador do sistema!!!', 'error');
    }).always(function(){
        if(!loading) base.loading.show(false);
    });
}

base.delete = function(url,payload,callback,loading)
{
   /*let headers = {
    'X-CSRF-TOKEN':"{{csrf_token()}}"
    }*/
    let headers = base.getHeaders();
    if(!loading) base.loading.show(true);
    $.ajax({
        url:url,
        data:payload,
        dataType:'json',
        method:'delete',
        headers:headers
    }).done(function(response){
        if(typeof(callback) == 'function') callback(response);
    }).fail(function(err){
        console.log(err);
        if(err.status == 422)
        {
            base.handle_formRequest(err.responseJSON.errors);
        }else{
            showMessage('Ocorreu um erro, contate o administrador do sistema!!!', 'error');
        }
    }).always(function(){
        if(!loading) base.loading.show(false);
    });
}
/**
 * this context is to be used with de ExcelApi from the backend.
 * the DownloadController will return an instance of ExcelApi with the Headers
 * will make the downlaod of this spreadSheet from here
 * @function downloadFile
 * @var url the api url
 * @var payload the data you what to put in the spreadSheet non mandatory, when you need external data to do so, just call you scope from the bachend
 * @var callback is the function that will be called wen the request finish. You may use this._makeFile with the response.target.response
 */
base.download = function(url,payload,callback,loading){
    var xhr,headers;
    headers = this.getHeaders();
    xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.responseType = 'blob';
    xhr.setRequestHeader('X-CSRF-TOKEN',headers['X-CSRF-TOKEN']);
    //xhr.setRequestHeader('Authorization', headers['Authorization']);
    xhr.setRequestHeader('Content-type', headers['Accept']);
    xhr.onload= function(data){
        base.loading.show(false);
        callback(data);
    }
    xhr.onerror = function(){
        base.loading.show(false);
    }
    xhr.send(JSON.stringify(payload));
    base.loading.show(true);
};
/**
 * when you need to simple downalod a file
 * this function will create the default structure do to so.
 * can be used by acessor from downloadFile function
 * @var blob:Blob the blob file
 * @var filename:string the file name with extension
 */
base._makeFile = function(blob, filename){
    let anchor = document.createElement('a');
    anchor.download = filename;
    anchor.href = URL.createObjectURL(blob);
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);
}
base.handle_error = function(data)
{
    var ret = [];
    if(data.message && typeof(data.message) == 'string'){
        try{
            var msg = JSON.parse(data.message);
            var keys = Object.keys(msg);
            ko.utils.arrayForEach(keys,function(k){
                ret.push(msg[k]);
            });
        } catch(e) {
            // se caiu aqui não veio um objeto na message
            ret.push(data.message);
        }
    }
    if(data.mensagem && typeof(data.mensagem) == 'string'){
        try{
            var msg = JSON.parse(data.mensagem);
            var keys = Object.keys(msg);
            ko.utils.arrayForEach(keys,function(k){
                ret.push(msg[k]);
            });
        } catch(e) {
            // se caiu aqui não veio um objeto na mensagem
            ret.push(data.mensagem);
        }
    }
    return ret;
}
base.handle_formRequest = function(data){
    var keys = Object.keys(data);

    ko.utils.arrayForEach(keys,function(k){
        return toastr.error(data[k], 'Atenção',{timeOut: 8000})
    });
}


base._formatDate = function(data, format = 'DD/MM/YYYY')
{
    return moment(data).format(format);
};



base._ecrypt = function(string)
{
    return md5(string);
}

base.inArray = function(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(typeof haystack[i] == 'object') {
            if(arrayCompare(haystack[i], needle)) return true;
        } else {
            if(haystack[i] == needle) return true;
        }
    }
    return false;
}

base.dataURItoBlob = function(dataURI)
{
    // convert base64 to raw binary data held in a string
  // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
  var byteString = atob(dataURI.split(',')[1]);

  // separate out the mime component
  var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

  // write the bytes of the string to an ArrayBuffer
  var ab = new ArrayBuffer(byteString.length);

  // create a view into the buffer
  var ia = new Uint8Array(ab);

  // set the bytes of the buffer to the correct values
  for (var i = 0; i < byteString.length; i++) {
      ia[i] = byteString.charCodeAt(i);
  }

  // write the ArrayBuffer to a blob, and you're done
  var blob = new Blob([ab], {type: mimeString});
  return blob;
}


base._KNOCKOUT_OVERRIDE_VALIDATION = {
    registerExtenders           : true,
    messagesOnModified          : true,
    errorsAsTitle               : true, // enables/disables showing of errors as title attribute of the target element.
    errorsAsTitleOnModified     : false, // shows the error when hovering the input field (decorateElement must be true)
    messageTemplate             : null,
    insertMessages              : true, // automatically inserts validation messages as <span></span>
    parseInputAttributes        : false, // parses the HTML5 validation attribute from a form element and adds that to the object
    writeInputAttributes        : false, // adds HTML5 input validation attributes to form elements that ko observable's are bound to
    decorateInputElement        : true, // false to keep backward compatibility
    decorateElementOnModified   : true, // true to keep backward compatibility
    errorClass                  : 'validationMessage', // single class for error message and element
    errorElementClass           : 'validationElement', // class to decorate error element
    errorMessageClass           : 'validationMessage', // class to decorate error message
    allowHtmlMessages           : true, // allows HTML in validation messages
    grouping: {
        deep        : false, //by default grouping is shallow
        observable  : true, //and using observables
        live        : false //react to changes to observableArrays if observable === true
    },
    validate: {
        // throttle: 10
    }
};
