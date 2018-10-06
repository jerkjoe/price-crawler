/*
    This is the entry point file
    Author: Joseph Jin
    Date: 2018-10-15
    Using: Node.js, request, cheerio
*/

var request = require('request')
var cheerio = require('cheerio')
var fs = require('fs')
var clubs = {}


const Json2csvParser = require('json2csv').Parser;
const fields = ['fas',
    'club16',
    'shesfit',
    'fitr4less',
    'goodlife',
    'equinox',
    'oxygen',
    'yyoga',
    'snap',
    'planet']


const Nightmare = require('nightmare')
const nightmare = Nightmare({ show: false })
clubs.fas = {}






// Club 16
var url = 'https://www.trevorlindenfitness.com/downtown-vancouver/'
request(url, function (err, response, html) {
    if (!err) {
        var $ = cheerio.load(html)
    }
    else {
        console.log(err)
        console.log(response)
    }
    var priceCards = $('[id*="ultimate-heading"]')
    clubs.club16 = {}
    priceCards.find('.uvc-main-heading > h2').each(function (index) {
        clubs.club16[priceCards.find('.uvc-main-heading > h2')[index].children[0].data] = priceCards.find('.uvc-sub-heading > h2 > span > strong')[index].children[0].data
    })


    // She's fit
    var url2 = 'https://www.shesfit.com/clubs/fitness-centre-abbotsford/#membership'
    request(url2, function (err, response, html) {
        /*
        *   This is for Club 16 
        */
        if (!err) {
            var $ = cheerio.load(html)
        }
        else {
            console.log(err)
            console.log(response)
        }
        var priceCards = $('[id*="ultimate-heading"]')
        clubs.shesfit = {}
        priceCards.find('.uvc-main-heading > h2').each(function (index) {
            clubs.shesfit[priceCards.find('.uvc-main-heading > h2')[index].children[0].data] = priceCards.find('.uvc-sub-heading > h2 > span > strong')[index].children[0].data
        })

        var options = {
            url: 'https://fit4less.ca/membership/',
            headers: {
                'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'
            }
        };
        request(options, function (err, response, html) {
            if (!err) {
                var $ = cheerio.load(html)
            }
            else {
                console.log(err)
                console.log(response)
            }
            clubs.fitr4less = {}
            var priceCards = $('.card')
            priceCards.each(function (index) {
                clubs.fitr4less[priceCards.find('.card > h3')[index].children[0].data] = '$' + priceCards.find('.price > strong')[index].children[0].data + ' / bi-weekly'
            })

            var goodlife = 'https://www.goodlifefitness.com/clubpap/getclubproducts?clubnumber=253'
            request(goodlife, function (err, response, html) {
                // .doubleFeatureBulletins .bulletinHeading


                html = JSON.parse(JSON.stringify(JSON.parse(html)).replace(/<sup>/gi, '').replace(/<\/sup>/gi, '')).clubProducts

                // console.log(html)
                if (!err) {
                    var $ = cheerio.load(html)
                }
                else {
                    console.log(err)
                    console.log(response)
                }
                clubs.goodlife = {}
                var priceCards = $('.doubleFeatureBulletins .bulletinHeading')
                priceCards.each(function (index) {

                    var str = $('.bulletinHeading > span')[index].children[0].data.split('')
                    str.splice(3, 0, '.')
                    str = str.join('')
                    clubs.goodlife[priceCards.find('small:last-child')[index].children[0].data] = str + ' / bi-weekly'

                })

                var equinox = 'https://api.equinox.com/v2/registration/residential/packages/860/?_=1539728450299'
                request(equinox, function (err, response, html) {
                    clubs.equinox = {}
                    if (!err) {
                        var plans = JSON.parse(html).result
                        for (var i = 0; i < plans.length; i++) {
                            clubs.equinox[plans[i]['name']] = '$' + plans[i].primaryMembershipPlanProperties.monthlyFee.basePrice + ' / monthly'
                        }
                        // console.log(JSON.parse(html).result.length)
                    }
                    else {
                        console.log(err)
                        console.log(response)
                    }
                    // console.log(clubs)
                    var oxygen = {
                        url: 'https://oxygenyogaandfitness.com/saanich-location/',
                        headers: {
                            'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'
                        }
                    }
                    request(oxygen, function (err, response, html) {
                        if (!err) {
                            var $ = cheerio.load(html)
                        }
                        else {
                            console.log(err)
                            console.log(response)
                        }
                        clubs.oxygen = {}
                        var priceCards = $('#et-boc > div > div.et_pb_section.et_pb_section_5.et_pb_with_background.et_section_regular > div > div.et_pb_column.et_pb_column_1_2.et_pb_column_2.et_pb_css_mix_blend_mode_passthrough > div > div > p:nth-child(3)>a')
                        priceCards.each(function (index) {
                            clubs.oxygen[priceCards[index].children[0].data.split('$')[0]] = '$' + priceCards[index].children[0].data.split('$')[1]
                        })


                        // YYoga
                        var yyoga = 'https://yyoga.ca/pricing/membership'
                        request(yyoga, function (err, response, html) {
                            if (!err) {
                                var $ = cheerio.load(html)
                            }
                            else {
                                console.log(err)
                                console.log(response)
                            }
                            clubs.yyoga = {}
                            var priceCards = $('.pricing-detail')
                            priceCards.each(function (index) {
                                clubs.yyoga[priceCards.find('h2')[index].children[0].data] = priceCards.find('h3')[index].children[0].data
                            })

                            var snap = 'https://www.snapfitness.com/ca/join-now/updateLocation?isAjax=1&locationId=601&enrolmentId=PGELe316JOb698j'
                            clubs.snap = {}
                            request(snap, function (err, response, html) {
                                if (!err) {
                                    // console.log(html)
                                    var result = JSON.parse(html).clubDetails.Plans
                                    for (var i = 0; i < result.length; i++) {
                                        clubs.snap[result[i].InfoSize] = result[i].PriceFormatted
                                    }
                                }
                                else {
                                    console.log(err)
                                    console.log(response)
                                }

                                var planet = 'https://www.planetfitness.com/gyms/surrey-bc/offers'
                                request(planet, function (err, response, html) {
                                    // console.log(html)
                                    if (!err) {
                                        var $ = cheerio.load(html)
                                    }
                                    else {
                                        console.log(err)
                                        console.log(response)
                                    }

                                    clubs.planet = {}
                                    var priceCards = $('.memberships-table--desktop .memberships-table--header-column')
                                    priceCards.each(function (index) {
                                        clubs.planet[priceCards.find('.memberships-table--offer-title')[index].children[0].data] = priceCards.find('.memberships-table--offer-cost')[index].children[0].data
                                    })



                                    //------------

                                    nightmare
                                        .goto('https://clients.mindbodyonline.com/classic/ws?studioid=432447&stype=40')
                                        .wait('#ContractsAndPackagesPanel > select')
                                        .select('#ContractsAndPackagesPanel > select', '109')
                                        .wait('.contract-item-amount[colspan]')
                                        .evaluate(() => {
                                            return [document.querySelector('#ContractsAndPackagesPanel > select > option:nth-child(4)').innerText, document.querySelector('#feesSection > div > table > tbody > tr.total-line > td.contract-item-amount').innerText]
                                        })
                                        .then(text => {
                                            clubs.fas[text[0].trim()] = text[1].trim() + ' / week'
                                            nightmare
                                                .goto('https://clients.mindbodyonline.com/classic/ws?studioid=432447&stype=40')
                                                .wait('#ContractsAndPackagesPanel > select')
                                                .select('#ContractsAndPackagesPanel > select', '104')
                                                .wait('.contract-item-amount[colspan]')
                                                .evaluate(() => {
                                                    return [document.querySelector('#ContractsAndPackagesPanel > select > option:nth-child(3)').innerText, document.querySelector('#feesSection > div > table > tbody > tr.total-line > td.contract-item-amount').innerText]
                                                })
                                                .then(text => {
                                                    clubs.fas[text[0].trim()] = text[1].trim() + ' / week'
                                                    nightmare
                                                        .goto('https://clients.mindbodyonline.com/classic/ws?studioid=432447&stype=40')
                                                        .wait('#ContractsAndPackagesPanel > select')
                                                        .select('#ContractsAndPackagesPanel > select', '108')
                                                        .wait('.contract-item-amount[colspan]')
                                                        .evaluate(() => {
                                                            return [document.querySelector('#ContractsAndPackagesPanel > select > option:nth-child(2)').innerText, document.querySelector('#feesSection > div > table > tbody > tr.total-line > td.contract-item-amount').innerText]
                                                        })
                                                        .end()
                                                        .then(text => {
                                                            clubs.fas[text[0].trim()] = text[1].trim() + ' / week'

                                                            // const json2csvParser = new Json2csvParser({ fields });
                                                            // const csv = json2csvParser.parse(clubs);
                                                            // console.log(clubs)
                                                            var csv = '\r\n\r\n'
                                                            for ( key in clubs) {
                                                                console.warn(csv, "   ++++++++++")
                                                                csv = csv + key + '\r\n'
                                                                for (type in clubs[key]) {
                                                                    csv = csv + ',' + type + ': ' + clubs[key][type].replace(',', '') + '\r\n'
                                                                }
                                                            }
                                                            

                                                            fs.writeFile('result_' + new Date().toDateString() + '.json', JSON.stringify(clubs), function (err) {
                                                                console.log(err)
                                                            })
                                                            fs.writeFile('test3.csv', csv, function (err) {
                                                                console.log(err)
                                                            })
                                                        })
                                                        .catch(error => {
                                                            console.error('Search failed:', error)
                                                        })
                                                })
                                                .catch(error => {
                                                    console.error('Search failed:', error)
                                                })
                                        })
                                        .catch(error => {
                                            console.error('Search failed:', error)
                                        })



                                    //============
                                }) // Planet
                            }) // Snap
                        }) // YYoga
                    }) // Oxygen
                }) // Equinox
            }) // GoodLife
        }) // Fit4less
    }) // Shesfit
}) // Club16


// fs.writeFile('result_'+new Date().toDateString()+'.json', JSON.stringify(clubs), function(err) {
//     console.log(err)
// })
// console.log(clubs)