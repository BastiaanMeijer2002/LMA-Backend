const getData = () =>{

    fetch('http://localhost:8000/api/search/eelde', {
        headers: new Headers({
            authorization: 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NTU2NDIxNzcsImV4cCI6MTY1NTY0NTc3Nywicm9sZXMiOltdLCJlbWFpbCI6ImJhc0BiYXMifQ.gOZ8r7BgzCOFr4VfE697jN-xo8a_qCVNIv8RHa9sYiltzRrU0k3iCcPt4dLVXhTIqwM2sobaitOmZaam6Ckk8KRCNrCgjCx6hPaDwZB_-ZaLjVzUPT7KxpLArnTWCsVvC-33D8CmH6j-F2fCdeZVx6I4MQRXF_rAWmHhE8HiAuQI27RYXHEPKkUp9Xi-gDoaZjH9-RZTwOQZmH6rj-IYfxlUNzYuRXouXHJXFnu_taxlxcRnXKXcvZfjwB8Gih7L_qiDRBZ_ggEp0FxrLgWqTEAey-13oco4pZiFhuDbf00-VI8-d_NmTBU8gdQN9JBP1s_QCLi8gUhehe-SuXX-qw'
        })
    }).then(r => console.log(r.json()))
}

getData();