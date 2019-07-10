'use strict'
const puppeteer = require("puppeteer")
const { expect } = require('chai')
const app = require("./frontend")
const { interceptRequest  } = require("./tests/utils")

const newUrl = "https://httpmocker.herokuapp.com/login"
const newMethod  ="POST"
const userId = "5cd5a211464bbe00172e02ae"

describe('Login e2e Test', () => {
   let server
   let browser
   let page
    before(async () => {
      server  =  app.listen(2000)
        browser =  await puppeteer.launch({
            headless: false
        })
         page = await browser.newPage()
    });

    after(async () => {
        server.close()
        await browser.close()

    });


    it('should visit login page', async () => {
        await page.goto("http://localhost:2000/login")
        const pageHeader = await page.$("#TextField39");
        expect(pageHeader).to.not.equal(null)
    });


    it('should show error message when login with wrong email', async () => {
        await page.goto("http://localhost:2000/login")
        
        await page.evaluate(interceptRequest, ({ newMethod, newUrl, userId, statusCode: 400 }))

        await page.type("#TextField39", "kofi@gmail.com")
        await page.type("#TextField40", "data")
        await page.click("#submit")
        await page.waitForSelector("#errorMessage", { visible: true })
        const erroBannerCss = await page.evaluate(() => document.getElementById('errorMessage').textContent);
        expect(erroBannerCss).to.equal("email is not valid")
    });


    // it('should show error message when login with wrong password', async () => {
    //     await page.goto("http://localhost:2000/login")
        
    //     await page.evaluate(interceptRequest, ({ newMethod, newUrl }))

    //     await page.type("#TextField39", "admin@gmail.com")
    //     await page.type("#TextField40", "data")
    //     await page.click("#submit")
    //     await page.waitFor(100)
    //     const erroBannerCss = await page.evaluate(() => document.getElementById('errorMessage').textContent);
    //     expect(erroBannerCss).to.equal("password is not valid")
    // });


    it('should redirect to home page when login is successful', async () => {
        await page.goto("http://localhost:2000/login")
        
        await page.evaluate(interceptRequest, ({ newMethod, newUrl, userId, statusCode: 200 }))

        await page.type("#TextField39", "admin@gmail.com")
        await page.type("#TextField40", "admin")
        await page.click("#submit")
        await page.waitForNavigation({'waitUntil': 'networkidle0'});
        const home = await page.evaluate(() => document.querySelector('body').textContent);
        expect(home).to.equal("Welcome home")
    });


});