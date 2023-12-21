const express = require('express');

const router = require('./routes/api');

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.urlencoded({extended: true})); 

app.use(router);

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});