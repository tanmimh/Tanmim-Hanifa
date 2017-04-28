package travelpals.travelpals;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Tanmimh on 21/03/2017.
 */

public class SearchRequest extends StringRequest {

    private static final String LOGIN_REQUEST_URL = "http://doc.gold.ac.uk/~thani001/travelpals/Search.php";

    private Map<String, String> params;

    public SearchRequest(String destination, String startDate, String endDate, Response.Listener<String> listener){
        super(Request.Method.POST, LOGIN_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("destination", destination);
        params.put("startDate", startDate);
        params.put("endDate", endDate);
    }

    public Map<String, String> getParas(){
        return params;
    }

}
