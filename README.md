# 🎉 Welcome to your take home exercise! 🎉

Hello! In order to move forward, we'd like assess your current skill level a bit. To that end, this repository contains a short (approximately 3 hours max) project that you can use to demonstrate this. It consists of a backend and frontend part to test your knowledge in both areas.

We know that 3 hours is not a lot of time and you will probably not be able to complete everything you'd like. If you want to spend more time than that, using this as an opportunity to learn a new library or technology, or just generally making it more awesome, you are of course free to do so. But please don't feel pressured to! Feel free to work on it at your own pace and break it into as many or few sessions as you wish.

## Overview
The goal of this is to write a simple application to keep track of the current stock of devices.

- Split the code for the two parts in the `/backend` and `/frontend` directories respectively.
- To get started you can create a (private) fork of this repository on either gitlab or github so you can easily share the link later. Or you can clone it directly, make your changes locally and e-mail us an archive (zip) of your code when finished.

## Backend
### Requirements
- Create a JSON API in PHP which will
  - Return a list of devices via `GET /devices`. Response example:
  ```
  {
    "uuid": "503c74ba-32a0-4dc4-924b-29925cdc3d3f",
    "serialNumber": "337013212054594",
    "shipped": false
  }
  ```
  - Allow to filter devices by a search value via `GET /devices?search=:search`
  - Allow updating the `shipped` property (optionally serialNumber as well) of a device via `PUT /device/:uuid`
- The device data should be stored in/retrieved from an SQL database. We will leave the choice of database and implementation up to you, but please make sure the SQL schema is included in the code you submit.
- The backend application should be written in PHP, whether you'd like to use plain PHP or a framework is up to you.

Feel free to structure the code however you prefer and use third-party libraries at your discretion.

## Frontend
### Requirements
- Create a web application which will
 - Display a list of the devices retrieved from the JSON API, visualizing the three properties
 - Add a search box which will filter devices by a search value
 - Add a button for each device list entry which will toggle the `shipped` state of that device

Using a framework such as Angular is preferred, but not required.

Not need to spend too much time on making it beautiful. Basic aesthetics are welcome, but we are not grading your design skills here.

## Bonus tasks
 - Include some unit tests for the backend code you've written
 - Add some support for pagination to the device listing, including a backend implementation of it
 - Allow the adding and removing of devices

## Submitting your code
When you're finished please e-mail us back a link to the private repository or an archive (zip) of your code as attachment. Make sure any vendor/node_modules directories are not included.

Please include any information you'd like us to know about your submission, including any feedback or notes on things that were difficult, confusing, frustrating.

You can send the e-mail to mzijlstra@iveventures.com.

Thank you and good luck 🙏
