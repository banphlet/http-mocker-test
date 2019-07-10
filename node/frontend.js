'use strict'
require("dotenv").config()
const express = require('express')
const bodyParser = require("body-parser")
const app = express()

app
.set("view engine", "ejs")
.use(express.static("public"))
.use(bodyParser.json())
.use(bodyParser.urlencoded({ extended: false }))
.get("/", (req, res)=>{
    res.send("Welcome home")
})
.get("/login", (req, res)=>{
    res.render("login", { url: process.env.SERVER_URL })
})


module.exports = app