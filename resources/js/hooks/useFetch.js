import {useState, useEffect} from 'react';

export default function useFetch(url, options, token, method = 'GET', accionar = false) {
    const authorization = `Bearer ${token}`;// 'Bearer ' + token
    const ops = {
        method: method
        , credentials: 'include'
        , mode: 'cors'
        , headers: new Headers({
            'Authorization': authorization
            , 'Accept': 'application/json'
            , 'Content-Type': 'application/json'
            , 'Access-Control-Allow-Credentials':true
            , 'Access-Control-Request-Method': method
            , 'Access-Control-Request-Headers':'Authorization'
        })
    };
    const fullOptions = {...options, ...ops};

    const [response, setResponse] = useState({loading:true, result:null, error:null, status:0})

    useEffect(() => {
        (async () => {
            try {
                if (accionar) {
                    setResponse({loading:true, result:null, error:null, status:0});
                    const res = await fetch(url, fullOptions);
                    const json = await res.json();
                    setResponse({loading:false, result:json, error:null, status:parseInt(res.status)});
                }
            } catch(err) {
                setResponse({loading:false, result:null, error:err, status:0});
            }
        })()
    }, [url, options]);//poner [] si sólo debe ejecutarse en: https://www.digitalocean.com/community/tutorials/getting-started-with-react-hooks
    return response;
}