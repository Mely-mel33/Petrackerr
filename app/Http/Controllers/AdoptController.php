namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet; 
use App\Models\adoption;
use Illuminate\Support\Facades\Validator;
use Auth; 

/**class AdoptController extends Controller
{
    public function index(){
        $animalsToAdopt = Pet::where('is_adoptable', true)->get(); // Récupère les animaux marqués comme adoptables
        return view("PagesUser.Adoption.listAdopt", compact('animalsToAdopt'));
    }
    
    public function show(Pet $pet){
        return view("PagesUser.Adoption.showAdopt", compact('pet'));
    }
    
}*/
class AdoptController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $animalsToAdopt = Pet::where('is_adoptable', true)
                              ->where('user_id', '!=', $userId) // Exclude user's own pets
                              ->with('user') // Load the associated user
                              ->get(); 
        return view("PagesUser.Adoption.listAdopt", compact('animalsToAdopt'));
    }
    
    public function show(Pet $pet){
        return view("PagesUser.Adoption.showAdopt", compact('pet'));
    }

public function store(Request $request, $petId)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 400);
        }

        $userId = Auth::id();

        // Vérifier si l'utilisateur a déjà adopté cet animal
        $existingAdoption = Adoption::where('pet_id', $petId)
                                    ->where('user_id', $userId)
                                    ->first();

        if ($existingAdoption) {
            return response()->json(['success' => false, 'message' => 'Vous avez déjà adopté cet animal.'], 400);
        }

        // Créer une nouvelle adoption
        $adoption = new adoption();
        $adoption->pet_id = $petId;
        $adoption->user_id = $userId;
        $adoption->full_name = $request->full_name;
        $adoption->phone = $request->phone;
        $adoption->address = $request->address;
        $adoption->status = 'en_attente'; // Par défaut, l'adoption est en attente
        $adoption->remarque = null;

        // Sauvegarder l'adoption
        $adoption->save();

        return response()->json(['success' => true, 'message' => 'Adoption enregistrée avec succès!']);
    }
    public function viewAdoptionRequests()
    {
        $owner = Auth::user();
        $adoptions = adoption::whereHas('pet', function ($query) use ($owner) {
            $query->where('user_id', $owner->id);
        })->get();

        return view('PagesUser.Adoption.request', compact('adoptions'));
    }

 /*   public function AdoptionApprove($id)
    {
        $adoption = adoption::find($id);
        if ($adoption) {
            $adoption->status = 'acceptée'; // Approuvé
            $adoption->save();
            return redirect()->back()->with('succes', 'Rendez-vous accepte avec succes.');

            // Rediriger vers la liste des rendez-vous
            
    }
    return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
}

public function AdoptionReject(  $id)
{
    $adoption = adoption::find($id);

    if ($adoption) {
        $adoption->status = 'refusée'; // Rejeté
        
        $adoption->save();
        return redirect()->back()->with('error', 'Rendez-vous refusé avec succes .');
    }

    return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
}
public function ajouterRemarqu(Request $request, $id)
{
    $adoption = adoption::findOrFail($id);
    $adoption->remarque = $request->input('remarque');
    $adoption->save();

    return redirect()->back()->with('success', 'Remarque ajoutée avec succès.');
}*/
public function adopdes(adoption $adoptions)
{
    $user = auth()->user(); // Obtenir l'utilisateur authentifié

    $adoptions = adoption::where('user_id', $user->id) // Filtrer par l'utilisateur authentifié
        ->where('created_at', '>=', now()->subHours(48))
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('PagesUser.Adoption.adopdes', compact('adoptions'));
}
public function approve($id)
{
    $adoption = Adoption::find($id);
    if ($adoption) {
        $adoption->status = 'acceptée';
        $adoption->save();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Demande non trouvée.']);
    }
}

public function reject($id)
{
    $adoption = Adoption::find($id);
    if ($adoption) {
        $adoption->status = 'refusée';
        $adoption->save();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Demande non trouvée.']);
    }
}

public function addRemark(Request $request, $id)
{
    $adoption = Adoption::find($id);
    if ($adoption) {
        $adoption->remarque = $request->input('remarque');
        $adoption->save();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Demande non trouvée.']);
    }
}
}



        

