'use strict'
const express = require('express')
const bodyParser = require("body-parser")
const app = express()
const cors = require("cors")

app
.set("view engine", "ejs")
.use(bodyParser.json())
.use(cors())
.use(bodyParser.urlencoded({ extended: false }))
.post("/login", (req, res)=>{
    const body = req.body
   try {
    if(body.email !== "admin@gmail.com"){
        throw new Error("email is not valid")
    }

    if(body.password !== "admin"){
        throw new Error("password is not valid")
    }

    return res.json({ data: { user_name: "kofi", email: body.email } })
   } catch (error) {
       res.status(400).json({ error: { details: error.message } })
   }
})
.listen(4000, ()=>{
    console.log("> server running on http://localhost:4000")
})