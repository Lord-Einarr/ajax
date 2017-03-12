function getRegions()
{
    var countryEl = document.getElementById('country');

    ajax('index.php?country=' + countryEl.options[countryEl.selectedIndex].value);
}

function populateDropdown(result)
{
    var result = JSON.parse(result);
    var regionEl = document.getElementById('region');
    regionEl.innerHTML = '<option value="">Select a region...</option>';
    for (var i = 0; i < result.length; i++)
    {
        regionEl.innerHTML += '<option value="' + result[i]['code'] + '">' + result[i]['name'] + '</option>';
    }
}

function ajax(url)
{
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == XMLHttpRequest.DONE)
        {
            if (xmlhttp.status == 200)
            {
                populateDropdown(xmlhttp.responseText);
            }
            else if (xmlhttp.status == 400)
            {
                alert('There was an error 400');
            }
            else
            {
                alert('something else other than 200 was returned');
            }
            return false;
        }
    };

    xmlhttp.open('GET', url, true);
    xmlhttp.send();
}
