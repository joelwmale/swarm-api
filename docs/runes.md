# Runes

## Rune Effects

Each rune array has a `pri_eff` and a `sed_eff`.

```
pri_eff = {
    the primary effect/stat on the rune - can contain 2 values
}

sec_eff = {
    the secondary effects/stats on the rune
}
```

These are 2 value arrays, with the first value matching one of the following effect:

```
0: '',
1: `HP +{x}`,
2: `HP {x}%`,
3: `ATK +{x}`,
4: `ATK {x}%`,
5: `DEF +{x}`,
6: `DEF {x}%`,
8: `SPD +{x}`,
9: `CRI Rate {x}%`,
10: `CRI Dmg {x}%`,
11: `Resistance {x}%`,
12: `Accuracy {x}%`
```

The second value is the value of the effect. E.g:

A `pri_eff` of 3, 15:

```
3, 15: ATK +15
8, 4, 0, 0: SPD+4
```

## Rune Efficiency

```js
getRuneEfficiency(rune, toFixed = 2) {
    let ratio = 0.0;

    // main stat
    ratio += this.rune.mainstat[rune.pri_eff[0]].max[rune.class] / this.rune.mainstat[rune.pri_eff[0]].max[6];

    // sub stats
    rune.sec_eff.forEach(stat => {
      let value = stat[3] && stat[3] > 0 ? stat[1] + stat[3] : stat[1];
      ratio += value / this.rune.substat[stat[0]].max[6];
    });

    // innate stat
    if (rune.prefix_eff && rune.prefix_eff[0] > 0) {
      ratio += rune.prefix_eff[1] / this.rune.substat[rune.prefix_eff[0]].max[6];
    }

    let efficiency = (ratio / 2.8) * 100;

    return {
      current: ((ratio / 2.8) * 100).toFixed(toFixed),
      max: (efficiency + ((Math.max(Math.ceil((12 - rune.upgrade_curr) / 3.0), 0) * 0.2) / 2.8) * 100).toFixed(toFixed)
    };
  }
```
