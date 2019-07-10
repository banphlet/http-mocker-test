<?php 
define('newUrl', 'https://httpmocker.herokuapp.com/login');
define('userId', '5cd5a211464bbe00172e02ae');


 function jsScript(){
    return "function interceptRequest(newMethod, statusCode, newUrl, userId){
        const oldXML = XMLHttpRequest.prototype.open
        XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
            oldXML.call(this, newMethod, newUrl, async, user, pass);
            this.setRequestHeader('user_id', userId);
            this.setRequestHeader('statuscode', statusCode)
        }
    }
    interceptRequest(arguments[0], arguments[1], arguments[2], arguments[3])

";

}

class loginCest
{

    public function visitLoginPageTest(AcceptanceTester $I){
        $I->amOnPage("/login.php");
        $I->seeInTitle("E2E Testing in Microservices");
        $I->see("Login to your account");
    }

    public function loginWithWrongEmailTest(AcceptanceTester $I){
        $I->amOnPage("/login.php");
        $I->executeJS(jsScript(), ["POST", "400", newUrl, userId]);
        $I->fillField("email", "kofi@gmail.com");
        $I->fillField("password", "united");
        $I->click("login");
        $I->waitForElementVisible("#errorMessage", 6);
        $I->see("email is not valid");
        $I->see("An error occurred");
    }

    public function loginWithRightCredientials(AcceptanceTester $I){
        $I->amOnPage("/login.php");
        $I->executeJS(jsScript(), ["POST", "200", newUrl, userId]);
        $I->fillField("email", "admmin@gmail.com");
        $I->fillField("password", "united");
        $I->click("login");
        $I->waitForElementVisible("#success", 6);
        $I->see("Login successful");
        $I->wait(4);
        $I->seeCurrentUrlEquals("/");
    }
}
