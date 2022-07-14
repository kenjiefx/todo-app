const express = require ('express')
const app = express()
var cors = require('cors')
const port = 5702

app.use(cors())
app.use(express.static('data'))

app.use(function(req,res){
    res.status(404)
    res.json({error:'Path Not Found'})
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})
