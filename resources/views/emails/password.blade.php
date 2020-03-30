the url() helper below adds a base url to the link
Click here to reset your password: {{ url('http://localhost:8000/password/reset/'.$token) }}