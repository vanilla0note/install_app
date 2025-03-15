
function order_edit() {

    $.blockUI({
        message: '申請單儲存中，請稍候！',
        css: {
            border: 'none',
            padding: '15px',
            'text-align': 'center',
            'font-size': '25px',
            'font-family': 'Microsoft JhengHei',

            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'


        }
    });


    // 透過 AJAX 送出第一個表單
    $.post($('#myForm_replies').attr('action'), $('#myForm_replies').serialize(), function (response) {
        myForm_replies.submit();
        console.log('Replies Form Submitted');
    });

    // 透過 AJAX 送出第二個表單
    $.post($('#myForm_notes').attr('action'), $('#myForm_notes').serialize(), function (response) {
        myForm_notes.submit();
        console.log('Notes Form Submitted');
    });

    // 透過 AJAX 送出第三個表單
    $.post($('#myForm_state').attr('action'), $('#myForm_state').serialize(), function (response) {
        myForm_state.submit();
        console.log('State Form Submitted');
    });

    
}


function order_del() {

    if (confirm("確定要刪除本張申請單嗎？")) 
        myForm_del.submit();
    

}
