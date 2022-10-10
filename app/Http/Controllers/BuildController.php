<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Build::paginate(10);
        return response()->json([
            'build' => $response,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $build = Build::where(['uid' =>  $request->uid, 
        'character_id' => $request->character_id, 
        'status' => $request->status, 
        ])
                // ->whereJsonContains('two_pcs_art', $request->two_pcs_art)
                ->first();
        if($build) //will be empty if no result
        $build->update([
            'nickname' => $request->nickname,
            'ascendsion' => $request->ascendsion, 
            'level' => $request->level,
            'friendship' => $request->friendship, 
            'conste' => $request->conste,
            'weapon_id' => $request->weapon_id,
            'refinement' => $request->refinement,
            'four_pcs_art' => $request->four_pcs_art,
            'two_pcs_art' => $request->two_pcs_art,
            'one_pcs_art' => $request->one_pcs_art,
            'equipList' => $request->equipList,
            'sands' => $request->sands,
            'goblet' => $request->goblet,
            'circlet' => $request->circlet,
            'normalAttack' => $request->normalAttack,
            'elementalSkill' => $request->elementalSkill,
            'elementalBurst' => $request->elementalBurst,
            'talent' => $request->talent,
            'talentExtraLv' => $request->talentExtraLv,
            'hp' => $request->hp,
            'attack' => $request->attack, 
            'defense' => $request->defense,
            'elementalMastery' => $request->elementalMastery, 
            'criticalRate' => $request->criticalRate,
            'criticalDamage' => $request->criticalDamage,
            'healingBonus' => $request->healingBonus,
            'energyRecharge' => $request->energyRecharge,
            'pyroDamageBonus' => $request->pyroDamageBonus,
            'hydroDamageBonus' => $request->hydroDamageBonus,
            'anemoDamageBonus' => $request->anemoDamageBonus,
            'electroDamageBonus' => $request->electroDamageBonus,
            'dendroDamageBonus' => $request->dendroDamageBonus,
            'cryoDamageBonus' => $request->cryoDamageBonus, 
            'geoDamageBonus' => $request->geoDamageBonus, 
            'physicalDamageBonus' => $request->physicalDamageBonus,
            'serverId' => $request->serverId,
            'party_id' => $request->party_id,
        ]);
        else
        $build = Build::create([
            'uid' => $request->uid, 
            'nickname' => $request->nickname,
            'character_id' => $request->character_id, 
            'ascendsion' => $request->ascendsion, 
            'level' => $request->level,
            'friendship' => $request->friendship, 
            'conste' => $request->conste,
            'weapon_id' => $request->weapon_id,
            'refinement' => $request->refinement,
            'four_pcs_art' => $request->four_pcs_art, 
            'two_pcs_art' => $request->two_pcs_art,
            'one_pcs_art' => $request->one_pcs_art,
            'equipList' => $request->equipList,
            'sands' => $request->sands,
            'goblet' => $request->goblet,
            'circlet' => $request->circlet,
            'normalAttack' => $request->normalAttack,
            'elementalSkill' => $request->elementalSkill,
            'elementalBurst' => $request->elementalBurst,
            'talent' => $request->talent,
            'talentExtraLv' => $request->talentExtraLv, 
            'hp' => $request->hp,
            'attack' => $request->attack, 
            'defense' => $request->defense,
            'elementalMastery' => $request->elementalMastery, 
            'criticalRate' => $request->criticalRate,
            'criticalDamage' => $request->criticalDamage,
            'healingBonus' => $request->healingBonus,
            'energyRecharge' => $request->energyRecharge,
            'pyroDamageBonus' => $request->pyroDamageBonus,
            'hydroDamageBonus' => $request->hydroDamageBonus,
            'anemoDamageBonus' => $request->anemoDamageBonus,
            'electroDamageBonus' => $request->electroDamageBonus,
            'dendroDamageBonus' => $request->dendroDamageBonus,
            'cryoDamageBonus' => $request->cryoDamageBonus, 
            'geoDamageBonus' => $request->geoDamageBonus, 
            'physicalDamageBonus' => $request->physicalDamageBonus,
            'serverId' => $request->serverId,
            'party_id' => $request->party_id,
            'status' => $request->status,
        ]);
        return response()->json([
            'data' => $build,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function show(Build $build)
    {
        //
    }

    public function showBuild($id)
    {
        $build = Build::with('character','weapon','party')->find($id);
        return response()->json([ 'build' => $build ]);
    }

    public function showcaseUID($uid){
        $response = Build::where('uid', $uid)->with('character','weapon')->get();
        $count = Build::where('uid', $uid)->with('character','weapon','party')
           ->get()->groupBy(function($data) {
            return $data->character_id;
        });
        return response()->json([
            'data' => $count,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function edit(Build $build)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Build $build)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function destroy(Build $build)
    {
        //
    }
}
