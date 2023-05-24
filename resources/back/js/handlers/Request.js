/**
 * for send new request,  previous request MUST completed
 * @type {boolean}
 */
let isAvailableSendRequest = true;
/**
 * SendRequest use ajax for send request, improve code style and control all requests from here
 */
const Request = () => {
    // if a request was running, ignoring more request
    if (!isAvailableSendRequest) {
        console.warn('Is to many request!, please try again later');
        return;
    }
    // showing loader
    // backdropLoaderElm.show();
    isAvailableSendRequest = false;
    let response;

    const send = async (ajaxParam = {}, customOptions) => {
        // send request
        response = await $.ajax({
            success: (res) => {
                console.log(res)
                response = res;

            }, error: (err) => {
                console.log(err);
                response = err;
            }, complete: () => {
                isAvailableSendRequest = true;
                // backdropLoaderElm.hide();
            },
            ...ajaxParam,

        });
        return response;
    }

    return {
        send,
    }

}

export default Request;
