const login = () =>{

    fetch('http://localhost:8000/api/login_check')
}

const getData = () =>{

    fetch('http://localhost:8000/live/2020', {
        headers: new Headers({
            authorization: 'Bearer: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NTU2NDA5NzgsImV4cCI6MTY1NTY0NDU3OCwicm9sZXMiOlsiUk9MRV9VU0VSIl0sImVtYWlsIjoiYmFzQGJhcyJ9.fZnpk6ACllInOKSR1eqMKdiBwHHqIVzbccuzlkM_xPJDxhAuJ0Mvy0MmOUBnLA5aQL2ipe5yMYQCu3VKJ3RJ4exZXd3GizBcegr9iaEZ0GqUXPlRegE9WzGv1frKhPEVeEfqwQ6RQUEg8KXvEb36IwMfrj9pHH1UJ6pyxnenc9K740a9fC4bFlvx09OTumlbAIrR97t6hJ6rCit028tcw31fLc6By2U17ZtO2s8QUZmwC86OQK0XTg40hDFlHRV7szk8VJFuRHs09K7xR7EFQqmO0cp76HMkkTtyiVWHyPYpUNN834BtTrb9mrRX0nfT-OFFF0rXl9_T278hqtPB8Q'
        })
    }).then(r => console.log(r.json()))
}

getData();