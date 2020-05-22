//Display units with cost in main page 
async function ajaxDisplayUnits(cost)
{
    let url = "php/ajax_get_units.php?cost=" + cost;
    try
    {
        const response = await fetch(url,
                {
                    method: "GET",
                    headers: {'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = "";
        for (let i = 0; i < jsonData.length; i++)
        {
            htmlString += '<div class="unit_div">'
                    + '<a class="unit_page" href="unit.php?unit_id=' + jsonData[i].unit_id + '"><img class="unit_icon" src="' + jsonData[i].image + '" alt="' + jsonData[i].name + '"></a><br><p>' + jsonData[i].name + '</p>'
                    + '<div class="hidden_unit_div">'
                    + '<div class="header">'
                    + '<div class="hidden_icon"><img src="' + jsonData[i].image + '" alt="' + jsonData[i].name + '"></div>'
                    + '<br><p>' + jsonData[i].name + '</p>'
                    + '</div>'
                    + '<div class="hidden_tier"><h1>' + jsonData[i].unit_tier + '</h1></div>'
                    + '</div>'
                    + '</div>';
        }
        document.getElementById('units').innerHTML = htmlString;
    }
}


//display all compositions with tier
async function ajaxDisplayComps(tier)
{
    let url = "php/ajax_get_composition.php?tier=" + tier;

    try
    {
        const response = await fetch(url,
                {
                    method: "GET",
                    headers: {'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = "";
        for (let i = 0; i < jsonData.length; i++)
        {
            htmlString += '<div class=comp_div>'
                    + '<div class="comp_head"><div class="comp_tier">' + jsonData[i].comp_tier + '</div>'
                    + '<div class="comp_name">' + jsonData[i].name + '</div>'
                    + '</div>'
                    + '<div class="comp_content"></div>'
                    + '</div>';
        }
        document.getElementById('comps').innerHTML = htmlString;
    }
}

//display all compositions with tier and editable 
async function ajaxDisplayAllComps(tier, deleteOn)
{
    let url = "php/ajax_get_all_compositions.php?tier=" + tier;

    try
    {
        const response = await fetch(url,
                {
                    method: "GET",
                    headers: {'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = "";
        if (deleteOn)
        {
            for (let i = 0; i < Object.keys(jsonData).length; i++)
            {
                htmlString += '<div class=comp_div>'
                        + '<div class="comp_head"><div class="comp_tier ' + jsonData[Object.keys(jsonData)[i]].comp_tier + '"><div class="hidden_delete_tier"><a href="php/delete_composition_transaction.php?comp_id=' + jsonData[Object.keys(jsonData)[i]].comp_id + '">Delete</a></div>' + '</div>'
                        + '<div class="comp_name">' + jsonData[Object.keys(jsonData)[i]].comp_name + '</div>'
                        + '</div>'
                        + '<div class="comp_image_row">';
                for (let j = 0; j < jsonData[Object.keys(jsonData)[i]].units.length; j++)
                {
                    htmlString += '<div class="icon_wrapper"><div class="hidden_delete_unit"><a href="php/delete_unit_in_comp_transaction.php?unit_id=' + jsonData[Object.keys(jsonData)[i]].units[j].unit_id + '?&comp_id=' + jsonData[Object.keys(jsonData)[i]].comp_id + '">X</a></div><img src="' + jsonData[Object.keys(jsonData)[i]].units[j].image + '"></a><div class="hidden_unit_div"><div class="header"><div class="hidden_icon"><img src="' + jsonData[Object.keys(jsonData)[i]].units[j].image + '" alt="' + jsonData[Object.keys(jsonData)[i]].units[j].name + '"></div><br><p>' + jsonData[Object.keys(jsonData)[i]].units[j].name + '</p></div><div class="hidden_tier"><h1>' + jsonData[Object.keys(jsonData)[i]].units[j].unit_tier + '</h1></div></div></div>';
                }
                htmlString += '</div></div>';
            }
        } else
        {
            for (let i = 0; i < Object.keys(jsonData).length; i++)
            {
                htmlString += '<div class=comp_div>'
                        + '<div class="comp_head"><div class="comp_tier ' + jsonData[Object.keys(jsonData)[i]].comp_tier + '">' + jsonData[Object.keys(jsonData)[i]].comp_tier + '</div>'
                        + '<div class="comp_name">' + jsonData[Object.keys(jsonData)[i]].comp_name + '</div>'
                        + '</div>'
                        + '<div class="comp_image_row">';
                for (let j = 0; j < jsonData[Object.keys(jsonData)[i]].units.length; j++)
                {
                    htmlString += '<div class="icon_wrapper"><img src="' + jsonData[Object.keys(jsonData)[i]].units[j].image + '"><div class="hidden_unit_div"><div class="header"><div class="hidden_icon"><img src="' + jsonData[Object.keys(jsonData)[i]].units[j].image + '" alt="' + jsonData[Object.keys(jsonData)[i]].units[j].name + '"></div><br><p>' + jsonData[Object.keys(jsonData)[i]].units[j].name + '</p></div><div class="hidden_tier"><h1>' + jsonData[Object.keys(jsonData)[i]].units[j].unit_tier + '</h1></div></div></div>';
                }
                htmlString += '</div></div>';
            }
        }
        document.getElementById('comps').innerHTML = htmlString;
    }
}


//get all available compositions into options 
async function ajaxGetCompOptions()
{
    let url = "php/ajax_get_composition_options.php";

    try
    {
        const response = await fetch(url,
                {
                    method: "GET",
                    headers: {'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = '';
        for (let i = 0; i < jsonData.length; i++)
        {
            htmlString += '<option value="' + jsonData[i].comp_id + '">' + jsonData[i].comp_name + '</option>';
        }
        document.getElementById('comps_name_options').innerHTML = htmlString;
    }
}


//get all available unit into option
async function ajaxGetUnitOptions(comp_id)
{
    let url = "php/ajax_get_champs_options.php?comp_id=" + comp_id;

    try
    {
        const response = await fetch(url,
                {
                    method: "GET",
                    headers: {'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = '';
        for (let i = 0; i < jsonData.length; i++)
        {
            htmlString += '<option value="' + jsonData[i].unit_id + '">' + jsonData[i].name + '</option>';
        }
        document.getElementById('champs_name_options').innerHTML = htmlString;
    }
}


//functions to get URL from parameter
function getURL()
{
    var idUrl = window.location; // http://google.com?id=test
    var query_string = idUrl.search;
    var search_params = new URLSearchParams(query_string);
    var unit_id = search_params.get('unit_id');
    var intId = parseInt(unit_id);
    return intId;
}

//display individual unit page 
async function ajaxDisplayUnitPage()
{
    let url = "php/unit_individual_transaction.php";
    let jsonParameters = {unit_id: getURL()};
    console.log(JSON.stringify(jsonParameters));
    try
    {
        const response = await fetch(url,
                {
                    method: "POST",
                    headers: {'Accept': 'application/json', 'Content-Type': 'application/json'},
                    body: JSON.stringify(jsonParameters)
                });

        updateWebpage(await response.json());
    } catch (error)
    {
        console.log("Fetch failed: ", error);
    }


    /* use the fetched data to change the content of the webpage */
    function updateWebpage(jsonData)
    {
        let htmlString = "";
        for (let i = 0; i < jsonData.length; i++)
        {
            htmlString += '<div class="left_content"><div class="unit_header"><img src="' + jsonData[i].image + '"><div class="unit_name"><h1>' + jsonData[i].name + '</h1></div></div>';
            htmlString += '<div class="unit_content"><ul><li>Unit Tier: ' + jsonData[i].unit_tier + '</li><li>Cost: ' + jsonData[i].cost + '</li><li>HP: ' + jsonData[i].hp + '</li><li>Mana: ' + jsonData[i].mana + '</li><li>Armor: ' + jsonData[i].armor + '</li><li>Magic Resist: ' + jsonData[i].magic_resist + '</li></ul></div></div>';
            htmlString += '<div class="right_content"><div class="des_header"><h1>' + jsonData[i].ability + '</h1></div>';
            htmlString += '<div class="description"><h3>' + jsonData[i].ability_des + '</h3></div></div>';
        }
        document.getElementById('unit_page').innerHTML = htmlString;
    }
}
