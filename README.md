# MadeCurious. SilverStripe tech test

Please do NOT fork this repo in github, you can clone it and push it up to a new repo on your account.

## Installation with ddev

Make sure you have ddev installed and it is updated https://ddev.readthedocs.io/en/latest/

- `cp -n .env.example .env` and set any values if needed (defaults should work for ddev)
- `ddev start`
- `ddev composer install`
- `ddev import-db --file=ss_tech_test.sql`
- `ddev sake dev/build flush=all`
- `ddev launch` or open [https://ss-tech-interview.ddev.site/](https://ss-tech-interview.ddev.site/)
- `ddev exec ./vendor/bin/phpunit` to run tests

## Instructions

This is a very minimal site with a single custom page type that allows a candidate to submit a form. 

We have a list of bugs and enhancements that the "partner" has asked for below, please complete these in order.
Please also document any assumptions you make along the way.

1. The form on the "Submit yourself" page isn't working.

2. There should be some text from the CMS page which displays above the candidate form.

3. The "please tell us why" field should validate there's at least 20 words but it currently seems to accept "Lorem ipsum dolor sit amet".

4. Can we add the candidate's name to the thank you in the green popup when they submit the form?

5. Can we move the interview candidates list from the bottom of the CMS sidebar further up, maybe just below files?

6. We need to be able to change candidates from "Pending" to either "Approved" or "Declined". Could all 3 statuses also display in different lists or tabs within the interview candidates area e.g. first tab is only the "Pending" ones?

7. We need the "Thank you... " message that displays after you submit the password reset form in /admin to be customisable in the CMS, as an HTML text field.
